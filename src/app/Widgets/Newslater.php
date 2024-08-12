<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class Newslater extends AbstractWidget
{
    protected $config = [];

    public function run()
    {
        return view('widgets.newslater', [
            'config' => $this->config,
        ]);
    }
}
