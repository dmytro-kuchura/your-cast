<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 *
 * @property int $user_id
 * @property string $billing_from
 * @property string $billing_to
 * @property int $amount
 * @property string $status
 *
 * @property User $user
 *
 * @property string $created_at
 * @property string $updated_at
 */
class UserBilling extends Model
{
    protected $table = 'users_billings';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'user_id',
        'billing_from',
        'billing_to',
        'amount',
        'status',
        'created_at',
        'updated_at',
    ];

    public function user(): HasOne
    {
        return $this->hasOne('App\Models\User', 'id', 'user_id');
    }
}
