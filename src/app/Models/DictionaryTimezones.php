<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 *
 * @property string $code
 * @property string $value
 * @property int $parent_id
 *
 * @property string $status
 *
 * @property string $created_at
 * @property string $updated_at
 */
class DictionaryTimezones extends Model
{
    protected $table = 'dictionary_timezones';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'code',
        'value',
        'status',
        'created_at',
        'updated_at',
    ];
}
