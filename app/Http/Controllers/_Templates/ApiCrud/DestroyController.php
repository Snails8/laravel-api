<?php

namespace App\Http\Controllers\_Templates\ApiCrud;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Services\Utility\ApiErrorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DestroyController extends Controller
{
    private $apiErrorService;

    public function __construct(ApiErrorService $apiErrorService)
    {
        $this->apiErrorService = $apiErrorService;
    }

    /**
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        $blog = Blog::query()->find($id);

        $blog?->delete();   // 存在しない場合実行させない

        // 成功時は204,
        return $blog
            ? response()->json($blog, 204)->withHeaders([
                'Content-Type'     => 'application/json',
                'Content-Language' => 'en',
                'Location'         => 'http://localhost/v2.0/blogs',])
            : response()->json($this->apiErrorService->getNotFoundError($id), 404)->withHeaders([
                'Content-Type'     => 'application/problem+json',
                'Content-Language' => 'en',
                'Location'         => 'invalid',
            ]);
    }
}

// ------------------------------------------------
// 削除 成功時  204 Not Content
// ------------------------------------------------
// データは消えている(message 無いからわからん)
// ------------------------------------------------



//  ----header--------------------------------------
//  HTTP 1.1          422 Unprocessable Entity(処理ができないもの)
//  Content-Type:     application/problem+json
//  Content-Language: en
//  Location:         invaild
//  ------------------------------------------------
//
//  ----body-----------------------------------------
//  {
//	   "message": "record not found: id=$id "
//	   "documentation_url": "https://sample-document-url/v2.0/hoge",
//	   // "error_user_msg": ".. ユーザー向けエラーメッセージ ..."
//	   "errors": [
//        'name': '正しい値ではありません'
//		   ...//
//	   ]
//  }
//------------------------------------------------

