<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class Footer extends AbstractWidget
{
    protected $config = [];

    public function run()
    {
        return view('widgets.footer', [
            'config' => $this->config,
        ]);
    }
}
