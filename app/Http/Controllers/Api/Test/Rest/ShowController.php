<?php

namespace App\Http\Controllers\Api\Test\Rest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BlogPostRequest;
use App\Models\Blog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ShowController extends Controller
{
    /**
     * @param int $id
     * @return JsonResponse
     */
    public function show(Request $request, int $id): JsonResponse
    {
        // User が任意で値を取得できるような設計
        $params = $request->query()['fields'] ?? '';  //  'fields' => 'title,sample',"

        // クエリに応じて単体で取得できる処理
        if ($params) {
            $columns = explode(',', $params);   // カラムが存在すれば返却, TODO::クエリで指定したカラムが 無いと500履く

            $blog = Blog::query()->select($columns)->find($id);
        } else {
            $blog = Blog::query()->find($id);
        }

        // 存在しない存在しないリソースへのアクセスが来た場合、404 とerrorをjsonで返す
        $blog = $blog ?? $this->getErrors($id);

        return $blog
            ? response()->json($blog, 201)
            : response()->json([], 404);
    }

    /**
     * 存在しない存在しないリソースへのアクセスが来た場合、404 とerrorをjsonで返す
     * @param int $id
     * @return array[]
     */
    private function getErrors(int $id)
    {
        $data = [
            'error' => [
                "code"    => 1000,
                "message" =>  "record not found: id=".$id
            ],
        ];

        return $data;
    }
}

//     HTTP
//     201
//     return  されるもの

//     HTTP  201 Created

//    クライアントサイドで GET +  form_data で送信するとエラーが起きる

//    json
//    {
//        "id": 1,
//        "title": "not sample",
//        "detail": "update send from postmain",
//        "created_at": null,
//        "updated_at": "2022-01-26T11:53:41.000000Z"
//    }


//   ex) 存在しないリソースへのアクセスの場合
//  {
//      "error": {
//      "code": 1000,
//        "message": "record not found: id=111"
//      }
//  }
