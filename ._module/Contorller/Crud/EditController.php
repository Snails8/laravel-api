<?php

namespace App\Http\Controllers\_Templates\Crud;

use App\Models\Sample;
use App\Http\Controllers\Controller;
use App\Services\CrudService;
use Illuminate\View\View;

class EditController extends Controller
{
    private CrudService $crudService;

    public function __construct(CrudService $crudService)
    {
        $this->crudService = $crudService;
    }

    /**
     * 編集画面
     * @param Sample $sample
     * @return View
     */
    public function edit(Sample $sample): View
    {
        $title = 'テスト' . $sample->name;

        $data = [
            'sample'   => $sample,
            'title'    => $title
        ];

        return view('samples.edit', $data);
    }

}