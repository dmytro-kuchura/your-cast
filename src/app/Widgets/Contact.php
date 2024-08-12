<?php

namespace App\Widgets;

use Arrilot\Widgets\AbstractWidget;

class Contact extends AbstractWidget
{
    protected $config = [];

    public function run()
    {
        return view('widgets.contact', [
            'config' => $this->config,
        ]);
    }
}
