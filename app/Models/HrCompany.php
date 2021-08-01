<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class HrCompany extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * HrUser とのリレーション
     * @return HasMany
     */
    public function hrUsers(): HasMany
    {
        return $this->hasMany('App\Models\HrUser');
    }
}
