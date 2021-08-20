<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 *
 * @property string $version
 * @property string $name
 * @property string $short
 * @property string $description
 * @property string $status
 *
 * @property string $created_at
 * @property string $updated_at
 */
class Changelog extends Model
{
    protected $table = 'changelogs';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'version',
        'name',
        'short',
        'description',
        'status',
        'created_at',
        'updated_at',
    ];
}
