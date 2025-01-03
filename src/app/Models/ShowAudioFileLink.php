<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 *
 * @property string $token
 * @property string $status
 *
 * @property string $created_at
 * @property string $updated_at
 */
class ShowAudioFileLink extends Model
{
    protected $table = 'shows_audio_file_links';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'token',
        'status',
        'created_at',
        'updated_at',
    ];
}
