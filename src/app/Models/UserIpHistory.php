<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 *
 * @property int $user_id
 * @property string $ip_address
 * @property string $country
 * @property string $city
 * @property string $browser
 *
 * @property User $user
 *
 * @property string $created_at
 * @property string $updated_at
 */
class UserIpHistory extends Model
{
    protected $table = 'users_ip_history';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'ip_address',
        'country',
        'city',
        'browser',
        'created_at',
        'updated_at',
    ];

    public function user(): HasOne
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
