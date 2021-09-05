<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterPostRequest;
use App\Mail\RegisterMail;
use App\Models\Register;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

/**
 * sample予約
 */
class RegisterController extends Controller
{
    /**
     * 予約form 表示処理
     * @return View
     */
    public function showForm(): View
    {
        $title = 'sample register form';

        $description = 'sample';

        $data = [
            'title'       => $title,
            'description' => $description,
        ];

        return view('registers.index', $data);
    }

    /**
     * 送信処理
     * @param RegisterPostRequest $request
     * @return RedirectResponse
     */
    public function submit(RegisterPostRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        DB::beginTransaction();
        try {
            $reserve = new Register();

            $reserve->fill($validated)->save();
        } catch (\Exception $e) {
            DB::rollBack();

            Log::critical('データ保存中に本題が発生しました。ユーザー情報'. implode(' / ', $validated));
            abort('500', 'データ保存中に本題が発生しました。');
        }
        Mail::send(new RegisterMail($validated));
        return redirect()->route('register.thanks');
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

        return view('registers.thanks', $data);
    }
}
