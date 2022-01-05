<?php

namespace App\Helpers;

class UidHelper
{
    public static function generateUid(): string
    {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        $result = '';
        for ($i = 0; $i < 4; $i++) {
            $result .= $characters[mt_rand(0, 36)];
        }

        return $result;
    }
}
