<?php

namespace App\Http\Controllers\Api\HrAdmin\Rest;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, int $id): JsonResponse
    {
        $blog = Blog::query()->find($id);

        $blog->title   = $request->title;
        $blog->detail  = $request->detail;

        return $blog->update()
            ? response()->json($blog, 200)
            : response()->json([], 500);
    }
}
