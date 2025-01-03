<?php

namespace App\Models;

use App\Models\Enum\UserRole;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

/**
 * @property int $id
 *
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $currency
 * @property string $tariff
 * @property string $role
 * @property string $remember_token
 * @property string $system_id
 * @property string $uid
 *
 * @property string $email_verified_at
 * @property string $created_at
 * @property string $updated_at
 *
 * @property bool $isAdmin
 * @property bool $isPodcaster
 * @property UserIpHistory $history
 * @property Notification $notification
 */
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'role',
        'password',
        'system_id',
        'remember_token'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function history(): HasMany
    {
        return $this->hasMany('App\Models\UserIpHistory', 'user_id', 'id');
    }

    public function notifications(): HasMany
    {
        return $this->hasMany('App\Models\Notification', 'user_id', 'id');
    }

    public function isEmailVerified(): bool
    {
        return $this->email_verified_at !== null;
    }

    public function isAdmin(): bool
    {
        return $this->role === UserRole::ADMIN;
    }

    public function isPodcaster(): bool
    {
        return $this->role === UserRole::PODCASTER;
    }

    public function isUser(): bool
    {
        return $this->role === UserRole::USER;
    }
}
