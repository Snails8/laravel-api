<?php

namespace App\Services\Utility;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * Class CompanyService
 * @package App\Services
 */
class ApiErrorService
{
    /**
     * 存在しない存在しないリソースへのアクセスが来た場合、404 とerrorをjsonで返す
     * @param int $id
     * @return array[]
     */
    public function getNotFoundError(int $id): array
    {
        $data = [
            "title"             =>  "Recode not found",
            "detail"            => "record not found: id=".$id . "Please check id",
            "documentation_url" => 'http://docs.example.com/api/v1/authentication',
            // "error_user_msg": ".. ユーザー向けエラーメッセージ ..."
        ];

        return $data;
    }
}