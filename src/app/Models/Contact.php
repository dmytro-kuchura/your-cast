<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 *
 * @property string $name
 * @property string $email
 * @property string $message
 * @property string $ip
 * @property string $status
 *
 * @property string $created_at
 * @property string $updated_at
 */
class Contact extends Model
{
    protected $table = 'contacts';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'email',
        'message',
        'ip',
        'status',
        'created_at',
        'updated_at',
    ];
}
