<?php

namespace App\Http\Controllers\Api\HrAdmin\Rest;

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
//        $data = $this->getBlogs();
        $data = $this->getArrayBlogs();

        return response()->json($data, 200);
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
        $users = Blog::query()->get();

        $data = [
            'users' => $users,
            'text' => $text,
        ];

        return $data;
    }
}

        // front 側では以下のように受け取れる
//  return {
//    props: {
//      users: users
//    }
//  }
//
//
//
//  [
//    {
//      id: 1,
//      name: 'たにし',
//      kana: 'タニシ',
//      email: 'sample@gmail.com',
//      email_verified_at: '2021-11-12T00:30:40.000000Z',
//      role: 'master',
//      post: '',
//      office_id: 1,
//      created_at: '2021-11-12T00:30:40.000000Z',
//      updated_at: '2021-11-12T00:30:40.000000Z'
//    }
//  ]
//


//{
//    users: [
//    {
//        id: 1,
//      name: 'たにし',
//      kana: 'タニシ',
//      email: 'sample@gmail.com',
//      email_verified_at: '2021-11-12T00:30:40.000000Z',
//      role: 'master',
//      post: '',
//      office_id: 1,
//      created_at: '2021-11-12T00:30:40.000000Z',
//      updated_at: '2021-11-12T00:30:40.000000Z'
//    }
//  ],
//  text: 'sample text'
//}

