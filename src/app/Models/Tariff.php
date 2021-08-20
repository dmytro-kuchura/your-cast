<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 *
 * @property string $name
 * @property string $description
 * @property integer $cost
 * @property integer $discount
 * @property bool $is_discount
 * @property string $status
 *
 * @property string $created_at
 * @property string $updated_at
 */
class Tariff extends Model
{
    protected $table = 'tariffs';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'name',
        'description',
        'cost',
        'discount',
        'is_discount',
        'created_at',
        'updated_at',
    ];
}
