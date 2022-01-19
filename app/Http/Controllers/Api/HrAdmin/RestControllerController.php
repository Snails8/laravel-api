<?php

namespace App\Http\Controllers\Api\HrAdmin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * resr api の簡易版 json の挙動検証用
 */
class RestControllerController extends Controller
{
    public function index(): JsonResponse
    {
        $users = User::query()->get();

        return response()->json($users, 200);

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
    }
}
