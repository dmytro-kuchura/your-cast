<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 *
 * @property int $show_id
 *
 * @property string $audio
 * @property string $title
 * @property string $description
 *
 * @property string $cover
 * @property int $episode
 * @property int $season
 * @property string $episode_type
 *
 * @property string $content
 *
 * @property int $duration
 * @property string $explicit
 * @property string $status
 *
 * @property Show $show
 * @property AudioFile $audioFiles
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
        'audio',
        'title',
        'description',
        'cover',
        'episode',
        'season',
        'episode_type',
        'content',
        'duration',
        'explicit',
        'status',
        'created_at',
        'updated_at',
    ];

    public function show(): HasOne
    {
        return $this->hasOne('App\Models\Show', 'id', 'show_id');
    }

    public function audioFiles(): HasOne
    {
        return $this->hasOne('App\Models\AudioFile', 'id', 'show_id');
    }
}
