<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 *
 * @property string $email
 * @property string $status
 * @property string $token
 *
 * @property string $created_at
 * @property string $updated_at
 */
class Subscribe extends Model
{
    protected $table = 'subscribers';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'email',
        'status',
        'token',
        'created_at',
        'updated_at',
    ];
}
