<?php

namespace App\Http\Controllers\Api\Test\Rest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BlogPostRequest;
use App\Models\Blog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class UpdateController extends Controller
{
    /**
     * @param BlogPostRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function update(BlogPostRequest $request, int $id): JsonResponse
    {
        $blog = Blog::query()->find($id);

        $blog?->fill($request->validated())->save();

        return $blog
            ? response()->json($blog, 200)
            : response()->json($this->getErrors($id), 404);
    }

    /**
     * 存在しない存在しないリソースへのアクセスが来た場合、404 とerrorをjsonで返す
     * @param int $id
     * @return array[]
     */
    private function getErrors(int $id)
    {
        $data = [
            "message" =>  "record not found: id=".$id,
            "documentation_url" => 'http://docs.example.com/api/v1/authentication',
        ];

        return $data;
    }
}
// ------------------------------------------------------------
// json を返却するので 200
// ------------------------------------------------------------
//  {
//    "id": 1,
//    "title": "test",
//    "detail": "updated",
//    "created_at": null,
//    "updated_at": "2022-01-28T00:44:49.000000Z"
//  }


//  403 Forbiddon
//  HTTP 403、またはエラーメッセージ Forbiddenは、HTTPステータスコードの一つ。ページが存在するものの、特定のアクセス者にページを表示する権限が付与されず、アクセスが拒否されたことを示すもの
//  validation の $rules で許可していないと発生する
// ------------------------------------------------------------
// 存在しないid
// ------------------------------------------------------------
//  {
//    "error": {
//        "message": "record not found: id=15"
//    }
//  }