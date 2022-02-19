<?php

namespace App\Http\Controllers\_Templates\Crud;

use App\Http\Controllers\Controller;
use App\Models\Sample;
use App\Services\CrudService;
use App\Services\Utility\ApiErrorService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DestroyController extends Controller
{
    private CrudService $crudService;

    public function __construct(CrudService $crudService)
    {
        $this->crudService = $crudService;
    }

    /**
     * 削除
     * @Method DELETE
     * @param  Sample  $sample
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(Sample $sample): RedirectResponse
    {
        DB::beginTransaction();
        try {
            $sample->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            Log::critical($e->getMessage());
            session()->flash('critical_error_message', '削除中に問題が発生しました。');

            return redirect()->back()->withInput();
        }

        session()->flash('flash_message', $sample->name.'を削除しました');

        return redirect()->route('samples.index');
    }
}

