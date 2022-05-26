<?php

namespace App\Http\Controllers;

use App\Helpers\FeedGenerator;
use App\Services\ShowService;

class FeedController
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

        $feed = new FeedGenerator($show);

        return response($feed->generate()->saveXML(), 200, [
            'Content-Type' => 'application/xml'
        ]);
    }
}
