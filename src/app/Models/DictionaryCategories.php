<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @property int $id
 *
 * @property string $code
 * @property string $value
 * @property int $parent_id
 *
 * @property string $status
 *
 * @property DictionaryCategories $childrens
 *
 * @property string $created_at
 * @property string $updated_at
 */
class DictionaryCategories extends Model
{
    protected $table = 'dictionary_categories';

    /**
     * @var array
     */
    protected $fillable = [
        'id',
        'code',
        'value',
        'parent_id',
        'status',
        'created_at',
        'updated_at',
    ];

    public function childrens(): HasMany
    {
        return $this->hasMany('App\Models\DictionaryCategories', 'id', 'parent_id');
    }
}
