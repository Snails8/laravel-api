<?php

namespace App\Http\Controllers\Api\HrAdmin;

use App\Http\Controllers\Controller;
use App\Services\Api\HrAdmin\UserService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Class UserController
 * @package App\Http\Controllers\Api\HrAdmin
 */
class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * hr USer 取得処理
     * @return JsonResponse
     */
    public function getHrUsers(): JsonResponse
    {
        $users = $this->userService->getHrUsers();

        return response()->json($users, 200);
    }
}
