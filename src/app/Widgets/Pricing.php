<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class Pricing extends AbstractWidget
{
    protected $config = [];

    public function run()
    {
        return view('widgets.pricing', [
            'config' => $this->config,
        ]);
    }
}
