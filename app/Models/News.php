<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * お知らせ
 * Class News
 * @package App\Models
 */
class News extends Model
{
    use HasFactory;

    // そのままだとstringで取得してしまいformat()が使用できないためにDateTime型に変換(Eloquent)
    protected $dates = ['public_date'];
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * NewsCategory とのリレーション
     * @return BelongsTo
     */
    public function newsCategory(): BelongsTo
    {
        return $this->belongsTo('App\Models\NewsCategory');
    }
}
