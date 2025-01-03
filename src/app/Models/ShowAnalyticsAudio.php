<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 *
 * @property int $audio_file_id
 * @property string $country
 * @property string $city
 * @property string $url
 * @property string $os
 *
 * @property string $created_at
 * @property string $updated_at
 */
class ShowAnalyticsAudio extends Model
{
    protected $table = 'shows_analytics_audio';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'audio_file_id',
        'country',
        'city',
        'url',
        'os',
        'created_at',
        'updated_at',
    ];
}
