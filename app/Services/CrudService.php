<?php

namespace App\Services;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * Class CompanyService
 * @package App\Services
 */
class CrudService
{
    /**
     * @param $object
     * @param $validated
     * @return RedirectResponse|void
     */
    public function save($object, $validated)
    {
        DB::beginTransaction();
        try {
            $object->fill($validated)->save();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::critical($e->getMessage());
            session()->flash('critical_error_message', '保存中に問題が発生しました。');

            return redirect()->back()->withInput();
        }

        session()->flash('flash_message', '保存が完了しました。');
    }

    /**
     * @param $object
     * @return RedirectResponse|void
     */
    public function destroy($object)
    {
        DB::beginTransaction();
        try {
            $object->delete();

            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();

            Log::critical($e->getMessage());
            session()->flash('critical_error_message', '削除中に問題が発生しました。');

            return redirect()->back()->withInput();
        }

        session()->flash('flash_message', $object->name.'を削除しました');
    }
}