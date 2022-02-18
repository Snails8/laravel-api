<?php

namespace App\Http\Controllers\Api\Test\Rest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BlogPostRequest;
use App\Models\Blog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StoreController extends Controller
{
    /**
     * @param BlogPostRequest $request
     * @return JsonResponse
     */
    public function store(BlogPostRequest $request): JsonResponse
    {
        Log::debug($request);

        $blog = Blog::create($request->all());

        return $blog
            ? response()->json($blog, 201)->withHeaders([
                'Content-Type'     => 'application/json',
                'Content-Language' => 'en',
                'Location'         => 'https://localhost/v2.0/blogs',])
            : response()->json([], 500)->withHeaders([
                'Content-Type'     => 'application/problem+json',
                'Content-Language' => 'en',
                'Location'         => 'invalid',
            ]);
    }
}

// TODO:: 作成時にそのリソースのURIを渡してやると親切かもしれない
// TODO:: 作成しようとしたものがすでに存在する場合 409 Conflict にすべきかもだがどうする
// ------------------------------------------------------
// 成功時 201
// ------------------------------------------------------
//  {
//    "detail": "hoge",
//    "title": "sample",
//    "updated_at": "2022-01-27T12:23:56.000000Z",
//    "created_at": "2022-01-27T12:23:56.000000Z",
//    "id": 8
//  }

// ------------------------------------------------------


// ------------------------------------------------------
// validation 失敗時 HTTP 422
// API のvalidation  -> request class 作成によって可能
// ------------------------------------------------------

//{
//    "message": "The given data was invalid.",
//    "errors": {
//    "title": [
//        "名前は必ず入力してください。"
//      ]
//    }
//}