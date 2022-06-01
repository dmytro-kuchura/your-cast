<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 *
 * @property int $audio_file_link_id
 *
 * @property string $duration
 * @property string $size
 * @property string $link
 * @property string $status
 *
 * @property AudioFileLink $audioFileLink
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
        'audio_file_link_id',
        'duration',
        'size',
        'link',
        'status',
        'created_at',
        'updated_at',
    ];

    public function audioFileLink(): HasOne
    {
        return $this->hasOne('App\Models\AudioFileLink', 'id', 'audio_file_link_id');
    }
}
