<?php

namespace App\Services;

use App\Exceptions\ImageUploadException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Throwable;

class UploadService
{
    public static function saveImage(Request $request, string $param): ?string
    {
        if (isset($request['file'])) {
            $image = $request['file'];
            $path = self::getPathImage($param);
            try {
                $storage = Storage::disk('s3')->put($path, $image);
            } catch (Throwable $e) {
                throw new ImageUploadException($e->getMessage());
            }
            $bucket = Config::get('filesystems.disks.s3.bucket');
            return 'https://' . $bucket . '.s3.eu-central-1.amazonaws.com/' . $storage;
        }
        return null;
    }

    public static function saveAudio(Request $request): ?string
    {
        $audio = $request->file('audio');
        $folder = implode(['YCID', Auth::user()->system_id, '/audio']);
        try {
            $storage = Storage::disk('s3')->put($folder, $audio);
        } catch (Throwable $e) {
            throw new ImageUploadException($e->getMessage());
        }
        $bucket = Config::get('filesystems.disks.s3.bucket');
        return 'https://' . $bucket . '.s3.eu-central-1.amazonaws.com/' . $storage;
    }

    public static function getPathImage(string $param): string
    {
        $folder = implode(['YCID', Auth::user()->system_id]);
        return match ($param) {
            'artwork' => $folder . '/artwork',
            'avatar' => $folder . '/avatar',
            'cover' => $folder . '/cover',
            default => $folder . '/images',
        };
    }
}
