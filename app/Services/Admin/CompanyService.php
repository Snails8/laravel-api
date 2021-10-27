<?php

namespace App\Services\Admin;

use App\Http\Requests\Admin\CompanyPostRequest;
use App\Models\Company;
use App\Repositories\Admin\Company\CompanyRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class CompanyService
{
    protected $companyRepository;

    /**
     * EstatePhotoService constructor.
     * @param CompanyRepository $companyRepository
     */
    public function __construct(CompanyRepository $companyRepository)
    {
        $this->companyRepository = $companyRepository;
    }

    public function edit(Company $company): array
    {
        $title = '会社概要';

        $data = [
            'title'   => $title,
            'company' => $company,
        ];

        return $data;
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
            $this->companyRepository->update($company, $validated);
            DB::commit();

            session()->flash('flash_message', '更新完了しました');
            $res = redirect()->route('admin.company.index');

        } catch (\Exception $e) {
            DB::rollBack();
            Log::critical($e->getMessage());

            session()->flash('critical_error_message', '保存中に問題が発生しました');
            $res = redirect()->back()->withInput();
        }

        return $res;
    }
}