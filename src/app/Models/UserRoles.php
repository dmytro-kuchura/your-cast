<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 *
 * @property int $user_id
 * @property string $role
 *
 * @property User $user
 *
 * @property string $created_at
 * @property string $updated_at
 */
class UserRoles extends Model
{
    protected $table = 'users_roles';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'role',
        'created_at',
        'updated_at',
    ];

    public function user(): HasOne
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
