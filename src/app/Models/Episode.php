<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 *
 * @property int $show_id
 * @property int $audio_id
 *
 * @property string $title
 * @property string $description
 * @property string $cover
 * @property string $alias
 * @property string $link
 *
 * @property int $episode
 * @property int $season
 * @property string $episode_type
 *
 * @property string $content
 *
 * @property boolean $explicit
 * @property string $status
 *
 * @property Show $show
 * @property AudioFile $audioFile
 *
 * @property string $created_at
 * @property string $updated_at
 */
class Episode extends Model
{
    protected $table = 'episodes';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'show_id',
        'audio_id',
        'title',
        'description',
        'cover',
        'alias',
        'link',
        'episode',
        'season',
        'episode_type',
        'content',
        'explicit',
        'status',
        'created_at',
        'updated_at',
    ];

    public function show(): HasOne
    {
        return $this->hasOne('App\Models\Show', 'id', 'show_id');
    }

    public function audioFile(): HasOne
    {
        return $this->hasOne('App\Models\AudioFile', 'id', 'audio_id')->with('audioFileLink');
    }
}
