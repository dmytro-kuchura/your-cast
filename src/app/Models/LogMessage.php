<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 *
 * @property string $level
 * @property string $level_name
 * @property string $message
 * @property string $context
 * @property string $extra
 * @property string $logged_at
 *
 * @property string $created_at
 * @property string $updated_at
 */
class LogMessage extends Model
{
    protected $table = 'log_message';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'level',
        'level_name',
        'message',
        'context',
        'extra',
        'logged_at',
        'created_at',
        'updated_at',
    ];
}

