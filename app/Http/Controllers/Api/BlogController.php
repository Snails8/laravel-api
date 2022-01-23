<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        return Blog::all();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $blog = Blog::create($request->all());

        return $blog
            ? response()->json($blog, 201)
            : response()->json([], 500);
    }

    /**
     * @param Request $request
     * @param Blog $blog
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Blog $blog)
    {
        $blog->product = $request->product;
        $blog->order_date = $request->order_date;
        $blog->order_count = $request->order_count;

        return $blog->update()
            ? response()->json($blog)
            : response()->json([], 500);
    }

    /**
     * @param Blog $item
     * @return mixed
     */
    public function destroy(Blog $item)
    {
        return $item->delete();
    }
}
