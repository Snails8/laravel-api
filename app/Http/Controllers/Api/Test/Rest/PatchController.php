<?php

namespace App\Http\Controllers\Api\Test\Rest;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PatchController extends Controller
{
    public function patch(Request $request, int $id):JsonResponse
    {
        $blog = Blog::query()->find($id);

        $blog->title   = $request->title;
        $blog->detail  = $request->detail;

        return $blog->update()
            ? response()->json($blog, 200)
            : response()->json([], 500);
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
