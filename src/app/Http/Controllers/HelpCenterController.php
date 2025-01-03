<?php

namespace App\Http\Controllers;

use App\Services\ShowService;
use Illuminate\Contracts\View\View;

class HelpCenterController
{
    private ShowService $showService;

    public function __construct(
        ShowService $showService,
    )
    {
        $this->showService = $showService;
    }

    public function detail(string $token): View
    {
        $show = $this->showService->getShowByToken($token);
        return view('help-center', [
            'show' => $show,
        ]);
    }
}
