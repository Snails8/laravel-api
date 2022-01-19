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
    }
}
