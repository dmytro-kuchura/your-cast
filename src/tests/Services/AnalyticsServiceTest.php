<?php

namespace Tests\Services;

use App\Exceptions\NotCreateAnalyticException;
use App\Helpers\LoggerHelper;
use App\Integrations\Agent\Agent;
use App\Integrations\Geo\ApiCommunicator;
use App\Integrations\Geo\Request\GetGeoRequest;
use App\Integrations\Geo\Response\GetGeoResponse;
use App\Repositories\AnalyticsAudioRepository;
use App\Services\AnalyticsService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use PHPUnit\Framework\MockObject\MockObject;
use Tests\TestCase;
use Illuminate\Support\Facades\Request;

class AnalyticsServiceTest extends TestCase
{
    private AnalyticsAudioRepository|MockObject $repository;
    private ApiCommunicator|MockObject $apiCommunicator;
    private Agent|MockObject $agent;

    private AnalyticsService $analyticsService;

    protected function setUp(): void
    {
        parent::setUp();
        $this->repository = $this->createMock(AnalyticsAudioRepository::class);
        $this->apiCommunicator = $this->createMock(ApiCommunicator::class);
        $this->agent = $this->createMock(Agent::class);

        $this->analyticsService = new AnalyticsService(
            $this->repository,
            $this->apiCommunicator,
            $this->agent,
        );
    }

    public function testPrepareAndSave(): void
    {
        $fakeIp = '123.123.123.123';
        $fakeCity = 'fake-city';
        $fakeCountry = 'fake-country';
        $fakeFileId = 1;

        Redis::shouldReceive('hgetall')
            ->with($fakeIp)
            ->andReturn([]);
        $getRequest = new GetGeoRequest($fakeIp);

        $getResponse = $this->createMock(GetGeoResponse::class);
        $getResponse->expects($this->once())->method('getCity')->willReturn($fakeCity);
        $getResponse->expects($this->once())->method('getCountry')->willReturn($fakeCountry);

        $this->apiCommunicator
            ->expects($this->once())
            ->method('send')
            ->with($getRequest)
            ->willReturn($getResponse);

        Redis::shouldReceive('hmset')
            ->with($fakeIp, ['country' => $fakeCountry, 'city' => $fakeCity])
            ->andReturn();

        $this->agent
            ->expects($this->once())
            ->method('platform')
            ->willReturn('fake-os');

        $this->repository
            ->expects($this->once())
            ->method('store')
            ->willReturnCallback(function ($data) use ($fakeFileId, $fakeCountry, $fakeCity) {
                $this->assertEquals('fake-os', $data['os']);
                $this->assertEquals($fakeCountry, $data['country']);
                $this->assertEquals($fakeCity, $data['city']);
                $this->assertEquals($fakeFileId, $data['audio_file_id']);
                $this->assertEquals(config('app.url') . '/' . Request::path(), $data['url']);
            });

        DB::shouldReceive('beginTransaction')->withNoArgs();
        DB::shouldReceive('commit')->withNoArgs();

        Request::shouldReceive('ip')->andReturn($fakeIp);
        Request::shouldReceive('userAgent')->andReturn('fake-user-agent');

        $this->analyticsService->prepareAndSave($fakeFileId);
    }

    public function testPrepareAndSaveWithException(): void
    {
        $this->repository
            ->expects($this->once())
            ->method('store')
            ->willThrowException(new \Exception('fake-exception-message'));

        DB::shouldReceive('beginTransaction')->withNoArgs();
        DB::shouldReceive('rollBack')->withNoArgs();
        $this->expectException(NotCreateAnalyticException::class);

        $this->analyticsService->prepareAndSave(1);
    }
}
