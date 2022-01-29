<?php

namespace App\Http\Controllers\Api\Test\Rest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BlogPostRequest;
use App\Models\Blog;
use App\Services\Utility\ApiErrorService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PatchController extends Controller
{
    private $apiErrorService;

    public function __construct(ApiErrorService $apiErrorService)
    {
        $this->apiErrorService = $apiErrorService;
    }

    /**
     * @param BlogPostRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function patch(BlogPostRequest $request, int $id):JsonResponse
    {
        $blog = Blog::query()->find($id);

        $blog?->fill($request->validated())->save();

        return $blog->update()
            ? response()->json($blog, 200)->withHeaders([
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
