<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property int $show_id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $image
 * @property int $duration
 * @property string $explicit
 * @property int $episode
 * @property int $season
 * @property string $episode_type
 *
 * @property Show $show
 *
 * @property string $created_at
 * @property string $updated_at
 */
class Podcast extends Model
{
    protected $table = 'shows';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'show_id',
        'title',
        'description',
        'content',
        'image',
        'duration',
        'explicit',
        'episode',
        'season',
        'episode_type',
        'created_at',
        'updated_at',
    ];

    public function show(): HasOne
    {
        return $this->hasOne('App\Models\Show', 'id', 'show_id');
    }
}
