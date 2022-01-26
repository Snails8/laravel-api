<?php

namespace App\Http\Controllers\Api\HrAdmin\Rest;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\BlogPostRequest;
use App\Models\Blog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class CreateController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function store(BlogPostRequest $request): JsonResponse
    {
        Log::debug($request);

        $blog = Blog::create($request->all());

        return $blog
            ? response()->json($blog, 201)
            : response()->json([], 500);
    }
}

// TODO::API のvalidation