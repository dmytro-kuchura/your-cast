<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class Header extends AbstractWidget
{
    protected $config = [];

    public function run()
    {
        return view('widgets.header', [
            'config' => $this->config,
        ]);
    }
}
