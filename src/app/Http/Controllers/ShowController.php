<?php

namespace App\Http\Controllers;

use App\Helpers\FeedGenerator;
use App\Services\AnalyticsService;
use App\Services\EpisodesService;
use App\Services\ShowService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;

class ShowController extends Controller
{
    private ShowService $showService;
    private EpisodesService $episodesService;
    private AnalyticsService $analyticsService;

    public function __construct(
        ShowService $showService,
        EpisodesService $episodesService,
        AnalyticsService $analyticsService
    )
    {
        $this->showService = $showService;
        $this->episodesService = $episodesService;
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

    public function detail(string $token): View
    {
        $show = $this->showService->getShowByToken($token);
        $episodes = $this->episodesService->getShowEpisodes($show->id);
        return view('detail', [
            'show' => $show,
            'episodes' => $episodes,
        ]);
    }
}
