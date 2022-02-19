<?php

namespace App\Http\Controllers\_Templates\Crud;

use App\Models\Sample;
use App\Http\Controllers\Controller;
use App\Services\CrudService;
use Illuminate\View\View;

/**
 * resr api の簡易版 json の挙動検証用
 */
class IndexController extends Controller
{
    private CrudService $crudService;

    public function __construct(CrudService $crudService)
    {
        $this->crudService = $crudService;
    }

    /**
     * pdf出力
     * @param
     * @return View
     */
    public function index(): View
    {
        $samples = Sample::query()->orderBy('id')->get();
        $title = 'テスト';

        $data = [
            'samples' => $samples,
            'title'   => $title,
        ];

        return view('samples.index', $data);
    }

}