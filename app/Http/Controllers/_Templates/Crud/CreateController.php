<?php

namespace App\Http\Controllers\_Templates\Crud;

use App\Models\Sample;
use App\Http\Controllers\Controller;
use App\Services\CrudService;
use Illuminate\View\View;

class CreateController extends Controller
{
    private CrudService $crudService;

    public function __construct(CrudService $crudService)
    {
        $this->crudService = $crudService;
    }

    /**
     * @param Sample $sample
     * @return View
     */
    public function create(Sample $sample): View
    {
        $title = 'テスト 新規登録';

        $data = [
            'sample'   => $sample,
            'title'    => $title,
        ];

        return view('samples.create', $data);
    }

}