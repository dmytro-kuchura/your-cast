<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 *
 * @property string $duration
 * @property string $size
 * @property string $link
 * @property string $status
 *
 * @property string $created_at
 * @property string $updated_at
 */
class AudioFile extends Model
{
    protected $table = 'audio_files';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'duration',
        'size',
        'link',
        'status',
        'created_at',
        'updated_at',
    ];
}
