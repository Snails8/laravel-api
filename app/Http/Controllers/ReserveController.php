<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReservePostRequest;
use App\Models\Reserve;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

/**
 * sample予約
 */
class ReserveController extends Controller
{
    /**
     * 予約form 表示処理
     * @return View
     */
    public function showForm(): View
    {
        $title = 'sample reserve form';

        $description = 'sample';

        $data = [
            'title'       => $title,
            'description' => $description,
        ];

        return view('reserve.form', $data);
    }

    /**
     * 送信処理
     * @param ReservePostRequest $request
     * @return RedirectResponse
     */
    public function submit(ReservePostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            $reserve = new Reserve();

            $reserve->fill($validated)->save();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::critical('データ保存中に本題が発生しました。ユーザー情報'. implode(' / ', $validated));
            abort('500', 'データ保存中に本題が発生しました。');
        }
        return redirect()->route('reserve.thanks');
    }

    /**
     * Thanksページ
     * @return View
     */
    public function showThanks(): View
    {
        $title = 'Thanks';
        $description = 'sample Thanks';

        $data = [
            'title'       => $title,
            'description' => $description,
        ];

        return view('reserve.thanks', $data);
    }
}
