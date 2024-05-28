<?php

namespace App\Http\Controllers;

use App\Services\AnalyticsService;
use App\Services\AudioFileLinkService;
use App\Services\AudioFileService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;

class AudioController extends Controller
{
    private AudioFileLinkService $audioFileLinkService;
    private AudioFileService $audioFileService;
    private AnalyticsService $analyticsService;

    public function __construct(
        AudioFileLinkService $audioFileLinkService,
        AudioFileService $audioFileService,
        AnalyticsService $analyticsService
    )
    {
        $this->audioFileLinkService = $audioFileLinkService;
        $this->audioFileService = $audioFileService;
        $this->analyticsService = $analyticsService;
    }
    public function audio(string $audioLinkToken): RedirectResponse
    {
        $audioFileLinkId = $this->audioFileLinkService->getAudioFileId($audioLinkToken);
        $audioFile = $this->audioFileService->getAudioFile($audioFileLinkId);
        $this->analyticsService->prepareAndSave($audioFile->id);
        return Redirect::to($audioFile->link);
    }
}
