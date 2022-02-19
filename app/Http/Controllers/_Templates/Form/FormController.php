<?php

namespace App\Http\Controllers\_Templates\Form;

use App\Http\Controllers\Controller;
use App\Http\Requests\ContactPostRequest;
use App\Mail\ContactMail;
use App\Models\Contact;
use App\Services\CrudService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class FormController extends Controller
{
    private CrudService $crudService;

    public function __construct(CrudService $crudService)
    {
        $this->crudService = $crudService;
    }

    /**
     * お問い合わせフォーム 表示処理
     * @return View
     */
    public function index(): View
    {
        $title       = 'お問い合わせ';
        $description = 'sample';

        $data = [
            'title'       => $title,
            'description' => $description,
        ];

        return view('samples.index', $data);
    }

    /**
     * 送信処理
     * @param ContactPostRequest $request
     * @return RedirectResponse
     */
    public function submit(ContactPostRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $sample = new Contact();

        $this->crudService->save($sample, $validated);
        Mail::send(new ContactMail($validated));

        return redirect()->route('samples.thanks');
    }

    /**
     * Thanksページ
     * @return View
     */
    public function showThanks(): View
    {
        $title       = 'Thanks';
        $description = 'sample Thanks';

        $data = [
            'title'       => $title,
            'description' => $description,
        ];

        return view('samples.thanks', $data);
    }
}
