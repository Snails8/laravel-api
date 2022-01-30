<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * お知らせカテゴリ
 * Class NewsCategory
 * @package App\Models
 */
class NewsCategory extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * News とのリレーション
     * @return HasMany
     */
    public function news(): HasMany
    {
        return $this->hasMany('App\Models\News');
    }
}
