<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CompanyPostRequest;
use App\Models\Company;
use App\Services\Admin\CompanyService;
use App\Services\UtilityService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * 自社情報管理
 * Class CompanyController
 * @package App\Http\Controllers\Admin
 */
class CompanyController extends Controller
{
    /**
     * CompanyController constructor.
     * @param UtilityService $utility
     * @param CompanyService $companyService
     */
    public function __construct(UtilityService $utility, CompanyService $companyService)
    {
        $this->utility     = $utility;
        $this->companyService = $companyService;
    }

    /**
     * 編集画面表示
     * @param Company $company
     * @return View
     */
    public function edit(Company $company): View
    {
        $title = '会社概要';

        $data = [
            'title'   => $title,
            'company' => $company,
        ];

        return view('admin.companies.edit', $data);
    }

    /**
     * 更新処理
     * @param CompanyPostRequest $request
     * @param Company $company
     * @return RedirectResponse
     */
    public function update(CompanyPostRequest $request, Company $company): RedirectResponse
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

        return redirect()->route('admin.company.edit', ['company' => $company->id]);
    }
}
