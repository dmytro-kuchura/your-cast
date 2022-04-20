<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 *
 * @property int $user_id
 * @property string $title
 * @property string $content
 * @property boolean $is_read
 * @property string $type
 *
 * @property string $created_at
 * @property string $updated_at
 */
class Notification extends Model
{
    protected $table = 'notifications';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'title',
        'content',
        'is_read',
        'type',
        'created_at',
        'updated_at',
    ];
}
