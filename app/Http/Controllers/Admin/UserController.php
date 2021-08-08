<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserPostRequest;
use App\Models\User;
use App\Services\UtilityService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * ユーザー管理 CRUD
 * Class UserController
 * @package App\Http\Controllers\Admin
 */
class UserController extends Controller
{
    const SELECT_LIMIT = 15;
    private $utility;

    /**
     * UserController constructor.
     * @param UtilityService $utility
     */
    public function __construct(UtilityService $utility)
    {
        $this->utility = $utility;
    }

    /**
     * 一覧
     * @Method GET
     * @param  Request  $request
     * @return View
     */
    public function index(Request $request): View
    {
        $params = $this->utility->initIndexParamsForAdmin($request);
        $users = $this->utility->getSearchResultAtPagerByColumn('User',$params, 'name',self::SELECT_LIMIT, false);

        $title = 'ユーザー 一覧';

        $data = [
            'users'  => $users,
            'params' => $params,
            'title'  => $title,
        ];

        return view('admin.users.index', $data);
    }

    /**
     * 新規作成画面
     * @Method GET
     * @param  User  $user
     * @return View
     */
    public function create(User $user): View
    {
//        $shops = $this->utility->getTargetColumnAssoc('Shop', 'name', false, false, false);
//        $shops = $this->utility->addEmptyRowToAssoc($shops,false);

        $title = 'ユーザー 新規作成';

        $data = [
//            'shops'    => $shops,
            'user'     => $user,
            'title'    => $title,
        ];

        return view('admin.users.create', $data);
    }

    /**
     * 編集画面
     * @Method GET
     * @param  User  $user
     * @return View
     */
    public function edit(User $user): View
    {
//        $shops = $this->utility->getTargetColumnAssoc('Shop', 'name', false, false, false);
//        $shops = $this->utility->addEmptyRowToAssoc($shops,false);

        $title = 'ユーザー 編集: '. $user->name;

        $data = [
//            'shops'  => $shops,
            'user'   => $user,
            'title'  => $title,
        ];

        return view('admin.users.edit', $data);
    }

    /**
     * 新規保存処理
     * @Method POST
     * @param  UserPostRequest  $request
     * @return RedirectResponse
     * @throws \Exception
     */
    public function store(UserPostRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);

        DB::beginTransaction();
        try {
            $user = new User;
            $user->fill($validated)->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::critical($e->getMessage());

            session()->flash('critical_error_message', '保存中に問題が発生しました。');
            return redirect()->back()->withInput();
        }

        session()->flash('flash_message', '新規作成が完了しました');

        return redirect()->route('admin.user.index');
    }

    /**
     * アップデート
     * @Method PUT
     * @param   $request
     * @param  User  $user
     * @return RedirectResponse
     * @throws \Throwable
     */
    public function update(UserPostRequest $request, User $user): RedirectResponse
    {
        $validated = $request->validated();
        $validated['password'] = bcrypt($validated['password']);

        DB::beginTransaction();
        try {
            $user->fill($validated)->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::critical($e->getMessage());

            session()->flash('critical_error_message', '保存中に問題が発生しました。');
            return redirect()->back()->withInput();
        }

        session()->flash('flash_message', '更新が完了しました');

        return redirect()->route('admin.user.index');
    }

    /**
     * 削除
     * @Method DELETE
     * @param  User  $user
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(User $user): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $user->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            Log::critical($e->getMessage());
            session()->flash('critical_error_message', '削除中に問題が発生しました。');

            return redirect()->back()->withInput();
        }

        session()->flash('flash_message', $user->name.'を削除しました');

        return redirect()->route('admin.user.index');
    }
}
