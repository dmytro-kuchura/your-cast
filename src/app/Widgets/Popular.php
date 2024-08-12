<?php

namespace App\Widgets;

use App\Services\ShowService;
use Arrilot\Widgets\AbstractWidget;

class Popular extends AbstractWidget
{
    protected $config = [];

    public function run(ShowService $service)
    {
        $popular = $service->getPopularShows();
        return view('widgets.popular', [
            'popular' => $popular,
            'config' => $this->config,
        ]);
    }
}
