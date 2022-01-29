<?php

namespace App\Http\Controllers\Api\Test\Rest;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    /**
     * @param Blog $item
     * @return mixed
     */
    public function destroy(int $id)
    {
        $blog = Blog::query()->find($id);

        $blog?->delete();   // 存在しない場合実行させない

        // 成功時は204,
        return $blog
            ? response()->json($blog, 204)
            : response()->json($this->getErrors($id), 404);
    }

    /**
     * 存在しない存在しないリソースへのアクセスが来た場合、404 とerrorをjsonで返す
     * @param int $id
     * @return array[]
     */
    private function getErrors(int $id): array
    {
        $data = [
            "message"           =>  "record not found: id=".$id,
            "documentation_url" => 'http://docs.example.com/api/v1/authentication',
            // "error_user_msg": ".. ユーザー向けエラーメッセージ ..."
        ];

        return $data;
    }
}

// ------------------------------------------------
// 削除 成功時  204 Not Content
// ------------------------------------------------
// データは消えている(message 無いからわからん)
// ------------------------------------------------

// ------------------------------------------------
// 存在しないリソースへの通信 404 Not Found
// http://localhost/api/users/111
// ------------------------------------------------
// {
//    "error": {
//    "code": 1000,
//        "message": "record not found: id=211"
//     }
//  }

