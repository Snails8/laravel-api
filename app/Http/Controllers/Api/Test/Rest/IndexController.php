<?php

namespace App\Http\Controllers\Api\Test\Rest;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

/**
 * resr api の簡易版 json の挙動検証用
 */
class IndexController extends Controller
{
    public function index(): JsonResponse
    {
//        $data = [];
//        $data = ['sample' => 'hoge'];
        $data = $this->getBlogs();
//        $data = $this->getArrayBlogs();

        return $data ? response()->json($data, 200) : response()->json($data, 204) ;
    }

    /**
     * @return Collection
     */
    private function getBlogs(): Collection
    {
        return Blog::query()->get();
    }

    /**
     * @return array
     */
    private function getArrayBlogs(): array
    {
        $text = 'sample text';
        $blogs = Blog::query()->get();

        $data = [
            'blogs' => $blogs,
            'text' => $text,
        ];

        return $data;
    }
}
// | 200 | OK           |
// | 204 | Not Content  | null , ''. []
// | 500 |  Internal Server Error


// ---------------------------------------------
//    配列で送る
//    $data = Blogs::query->get();
// ---------------------------------------------
//  直接配列が変える
//  [
//    {
//        "id": 1,
//        "title": "sample",
//        "detail": "sample detail",
//        "created_at": null,
//        "updated_at": null
//    },
//    {
//        "id": 2,
//        "title": "test",
//        "detail": "test detail",
//        "created_at": null,
//        "updated_at": null
//    },
//   ...// 直接配列で変える
//  ]
// ---------------------------------------------

// ---------------------------------------------
//  よくあるパターン  配列を含む 連想配列
//  $data = [’blogs’ ⇒ $blogs,  ‘title’ ⇒ $title];
// ---------------------------------------------
//  {
//    "blogs": [
//        {
//            "id": 1,
//            "title": "sample",
//            "detail": "sample detail",
//            "created_at": null,
//            "updated_at": null
//        },
//        {
//            "id": 2,
//            "title": "test",
//            "detail": "test detail",
//            "created_at": null,
//            "updated_at": null
//        },
//    ....//
//    ],
//    "title": "sample text"
//  }
// ---------------------------------------------

// ---------------------------------------------
//  文字列で送る
//  $data = "sample"
// ---------------------------------------------
//  "sample"        そのまま文字列に
// ---------------------------------------------


// ---------------------------------------------
//   配列に格納する
//   $data = ['sample'];
// ---------------------------------------------
//   [
//    "sample"
//   ]
// ---------------------------------------------

// ---------------------------------------------
//   連想配列に格納する
//   $data = ['sample' => 'hoge'];
// ---------------------------------------------
//  {
//    "sample": "hoge"
//  }
// ---------------------------------------------