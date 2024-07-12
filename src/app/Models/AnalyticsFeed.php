<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 *
 * @property int $show_id
 * @property string $country
 * @property string $city
 * @property string $url
 * @property string $os
 * @property string $agent
 *
 * @property string $created_at
 * @property string $updated_at
 */
class AnalyticsFeed extends Model
{
    protected $table = 'analytics_feed';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'show_id',
        'country',
        'city',
        'url',
        'os',
        'created_at',
        'updated_at',
    ];
}
