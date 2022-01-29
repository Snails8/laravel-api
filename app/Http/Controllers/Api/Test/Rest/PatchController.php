<?php

namespace App\Http\Controllers\Api\Test\Rest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BlogPostRequest;
use App\Models\Blog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PatchController extends Controller
{
    public function patch(BlogPostRequest $request, int $id):JsonResponse
    {
        $blog = Blog::query()->find($id);

        $blog?->fill($request->validated())->save();

        return $blog->update()
            ? response()->json($blog, 200)->withHeaders([
                'Content-Type'     => 'application/json',
                'Content-Language' => 'en',
                'Location'         => 'http://localhost/v2.0/blogs',])
            : response()->json($this->getErrors($id), 404)->withHeaders([
                'Content-Type'     => 'application/problem+json',
                'Content-Language' => 'en',
                'Location'         => 'invalid',
            ]);
    }

    /**
     * 存在しない存在しないリソースへのアクセスが来た場合、404 とerrorをjsonで返す
     * @param int $id
     * @return array[]
     */
    private function getErrors(int $id): array
    {
        $data = [
            "title"             => "record not found: id=".$id,
            "detail"            => "",
            "documentation_url" => 'http://docs.example.com/api/v1/authentication',
            // "error_user_msg": ".. ユーザー向けエラーメッセージ ..."
        ];

        return $data;
    }
}
