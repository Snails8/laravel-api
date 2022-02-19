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
        $title = '関連書式: 決済案内(買) 新規登録';

        $data = [
            'sample'   => $sample,
            'title'    => $title,
        ];

        return view('samples.create', $data);
    }

}