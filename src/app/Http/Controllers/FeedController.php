<?php

namespace App\Http\Controllers;

use App\Helpers\FeedGenerator;
use App\Services\AnalyticsService;
use App\Services\ShowService;
use Illuminate\Http\Response;

class FeedController extends Controller
{
    private ShowService $showService;
    private AnalyticsService $analyticsService;

    public function __construct(
        ShowService $showService,
        AnalyticsService $analyticsService
    )
    {
        $this->showService = $showService;
        $this->analyticsService = $analyticsService;
    }

    public function feed(string $token): Response
    {
        $show = $this->showService->getShowForFeed($token);
        if (!$show) {
            return response(null, 404, [
                'Content-Type' => 'application/xml'
            ]);
        }
        $feed = new FeedGenerator($show);
        $this->analyticsService->showFeed($show->id);
        return response($feed->generate()->saveXML(), 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
}
