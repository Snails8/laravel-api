<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Company
 * @package App\Models
 */
class Company extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    use HasFactory;

    /**
     * HrUsersとのリレーション(hr user => サービス利用者)
     * @return HasMany
     */
    public function HrUsers(): HasMany
    {
        return $this->hasMany('App\Models\HrUser');
    }
}
