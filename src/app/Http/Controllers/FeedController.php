<?php

namespace App\Http\Controllers;

use App\Helpers\FeedGenerator;
use App\Services\ShowService;

class FeedController extends Controller
{
    /** @var ShowService */
    private ShowService $service;

    public function __construct(ShowService $service)
    {
        $this->service = $service;
    }

    public function feed(string $token)
    {
        $show = $this->service->getShowForFeed($token);

        if (!$show) {
            return response(null, 404, [
                'Content-Type' => 'application/xml'
            ]);
        }

        $feed = new FeedGenerator($show);

        return response($feed->generate()->saveXML(), 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
}
