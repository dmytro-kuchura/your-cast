<?php

namespace Tests\Http\Controllers\Api;

use App\Http\Controllers\Api\AuthController;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Services\AuthService;
use App\Services\IpHistoryService;
use Illuminate\Support\Facades\Auth;
use Tests\TestCase;
use Mockery;

class AuthControllerTest extends TestCase
{
    /**
     * @var AuthService $authServiceMock
     */
    protected $authServiceMock;

    /**
     * @var IpHistoryService $ipHistoryServiceMock
     */
    protected $ipHistoryServiceMock;

    /**
     * @var AuthController $authController
     */
    protected $authController;

    public function setUp(): void
    {
        parent::setUp();

        $this->initDatabase();

        $this->authServiceMock = Mockery::mock(AuthService::class);
        $this->ipHistoryServiceMock = Mockery::mock(IpHistoryService::class);

        $this->authController = new AuthController($this->authServiceMock, $this->ipHistoryServiceMock);
    }

    public function tearDown(): void
    {
        Mockery::close();

        parent::tearDown();
    }

    /**
     * Tests the 'login' method of the AuthController
     */
    public function testLoginSuccess()
    {
        //Mocking Auth
        Auth::shouldReceive('attempt')->andReturn(true);
        Auth::shouldReceive('id')->andReturn(1);
        Auth::shouldReceive('user')->andReturn(new User);

        //Mocking AuthService
        $this->authServiceMock->shouldReceive('generate')->andReturn('token');
        $this->authServiceMock->shouldReceive('findRolesByUser')->andReturn(['role']);

        //Mocking IpHistoryService
        $this->ipHistoryServiceMock->shouldReceive('saveHistory')->andReturn(null);

        //Mocking LoginRequest
        $loginRequest = Mockery::mock(LoginRequest::class);
        $loginRequest->shouldReceive('validated')->andReturn(['remember' => true]);
        $loginRequest->shouldReceive('all')->andReturn([]);
        $loginRequest->shouldReceive('user')->andReturn(new User);

        $response = $this->authController->login($loginRequest);

        $this->assertEquals(200, $response->status());
    }

    public function testLoginFailed()
    {
        //Mocking Auth
        Auth::shouldReceive('attempt')->andReturn(false);

        //Mocking LoginRequest
        $loginRequest = Mockery::mock(LoginRequest::class);
        $loginRequest->shouldReceive('all')->andReturn([]);

        $response = $this->authController->login($loginRequest);

        $this->assertEquals(422, $response->status());
    }
}
