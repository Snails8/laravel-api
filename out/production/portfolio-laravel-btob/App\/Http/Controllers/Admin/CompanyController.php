<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CompanyPostRequest;
use App\Models\Company;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class CompanyController
 * @package App\Http\Controllers\Admin
 */
class CompanyController extends Controller
{
    /**
     * 一覧標示
     * @return View
     */
    public function index(): View
    {
        $title = '会社一覧';

        $data = [
            'title' => $title,
        ];

        return view('admin.companies.index', $data);
    }

    /**
     * 新規作成画面標示
     * @param Company $company
     * @return View
     */
    public function create(Company $company): View
    {
        $title = '会社登録';

        $data = [
            'title' => $title,
        ];

        return view('admin.companies.create', $data);
    }

    /**
     * 編集画面標示
     * @param Company $company
     * @return View
     */
    public function edit(Company $company): View
    {
        $title = '会社登録ページ';

        $data = [
            'title' => $title,
        ];

        return view('admin.companies.edit', $data);
    }

    /**
     * 登録処理
     * @param CompanyPostRequest $request
     * @return RedirectResponse
     */
    public function store(CompanyPostRequest $request) :RedirectResponse
    {
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            $company = new Company();

            $company->fill($validated)->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('critical_error_message', '保存中に問題が発生しました');
            Log::critical($e->getMessage());;
        }
        session()->flash('flash_message', '新規作成完了しました');

        return redirect()->route('admin.company.index');
    }

    /**
     * 更新処理
     * @param CompanyPostRequest $request
     * @param Company $company
     * @return RedirectResponse
     */
    public function update(CompanyPostRequest $request, Company $company)
    {
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            $company->fill($validated)->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            session()->flash('critical_error_message', '保存中に問題が発生しました');
            return redirect()->back()->withInput();
        }
        session()->flash('flash_message', '更新完了しました');

        return redirect()->route('admin.company.index');
    }
}
