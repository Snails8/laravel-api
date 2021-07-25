<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    /**
     * NewsCategory とのリレーション
     * @return BelongsTo
     */
    public function newsCategory(): BelongsTo
    {
        return $this->belongsTo('App\Models\NewsCategory');
    }
}
