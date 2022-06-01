<?php

namespace App\Http\Controllers;

use App\Services\AudioFileLinkService;
use App\Services\AudioFileService;
use Illuminate\Support\Facades\Redirect;

class AudioController extends Controller
{
    /** @var AudioFileLinkService */
    private AudioFileLinkService $audioFileLinkService;

    /** @var AudioFileService */
    private AudioFileService $audioFileService;

    public function __construct(AudioFileLinkService $audioFileLinkService, AudioFileService $audioFileService)
    {
        $this->audioFileLinkService = $audioFileLinkService;
        $this->audioFileService = $audioFileService;
    }
    public function audio(string $audioLinkToken)
    {
        $audioFileLinkId = $this->audioFileLinkService->getAudioFileId($audioLinkToken);

        $audioFile = $this->audioFileService->getAudioFile($audioFileLinkId);

        // TODO save log to analytics

        return Redirect::to($audioFile->link);
    }
}
