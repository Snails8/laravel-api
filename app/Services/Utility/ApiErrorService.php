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
            "title"             => "404 Not Found",
            "detail"            => "record not found: id=".$id . "Please check id",
            "documentation_url" => 'http://docs.example.com/api/v1/authentication',
            // "error_user_msg": ".. ユーザー向けエラーメッセージ ..."
        ];

        return $data;
    }
}
// RFC7807 : Problem Details for HTTP APIs
// https://datatracker.ietf.org/doc/html/rfc7807

//type (String) :エラーの詳細ドキュメントへのURL
//title (String) :人間が読むことのできる短いサマリー
//status (String) :サーバによって生成されたHTTPステータスコード
//detail (String) :人間が読むことのできる説明文
//instance (String) :問題の発生箇所の参照URI