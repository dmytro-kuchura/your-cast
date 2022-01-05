<?php

namespace App\Helpers;

use App\Exceptions\ImageUploadException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class UploadHelper
{
    public static function save(Request $request, string $param): ?string
    {
        if (isset($request['file'])) {
            $image = $request['file'];

            $path = self::getPathImage($param);

            try {
                $storage = Storage::disk('s3')->put($path, $image);
            } catch (\Throwable $e) {
                throw new ImageUploadException($e->getMessage());
            }

            return 'https://your-cast.s3.eu-central-1.amazonaws.com/' . $storage;
        }

        return null;
    }

    public static function saveAudio(Request $request): ?string
    {
        $systemId = Auth::user()->system_id;

        $audio = $request->file('audio');

        $path = 'YCID' . $systemId . '/audio';

        try {
            $storage = Storage::disk('s3')->put($path, $audio);
        } catch (\Throwable $e) {
            throw new ImageUploadException($e->getMessage());
        }

        return 'https://your-cast.s3.eu-central-1.amazonaws.com/' . $storage;
    }

    public static function getPathImage(string $param): string
    {
        switch ($param) {
            case 'show':
                $path = 'images/show';
                break;
            case 'podcast':
                $path = 'images/podcast';
                break;
            case 'avatar':
                $path = 'images/avatar';
                break;
            default:
                $path = 'images/default';
                break;
        }

        return $path;
    }
}
