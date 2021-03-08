<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 *
 * @property string $message
 * @property string $context
 * @property string $level
 * @property string $remote_addr
 * @property string $user_agent
 * @property string $request_header
 * @property string $request_body
 *
 * @property string $created_at
 * @property string $updated_at
 */
class Logs extends Model
{
    protected $table = 'logs';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'message',
        'context',
        'level',
        'remote_addr',
        'user_agent',
        'request_header',
        'request_body',
        'created_at',
        'updated_at',
    ];
}
