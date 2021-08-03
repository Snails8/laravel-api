<?php

namespace App\Services\Api\HrAdmin;

use App\Models\HrUser;
use Illuminate\Database\Eloquent\Collection;

/**
 * HrUser 取得処理
 */
class UserService
{
    public function getHrUsers(): Collection
    {
        $hrUsers = HrUser::query()->get();

        return $hrUsers;
    }
}