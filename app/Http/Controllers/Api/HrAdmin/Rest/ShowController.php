<?php

namespace App\Http\Controllers\Api\HrAdmin\Rest;

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
    public function show(int $id): JsonResponse
    {
        $blog = Blog::query()->find($id);

        return $blog
            ? response()->json($blog, 201)
            : response()->json([], 500);
    }
}


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

//   ex) TODO::存在しないリソースへのアクセスの場合
//   HTTP  500  Internal Server Error

//  TODO::ほしいカラムをクエリで問い合わせることができるような仕組み