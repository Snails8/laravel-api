<?php

namespace App\Http\Controllers\_Templates\Crud;

use App\Models\Sample;
use App\Http\Controllers\Controller;
use App\Services\CrudService;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/**
 * CRUD スピード型sample
 */
class CrudController extends Controller
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

    /**
     * @Method POST
     * @param SamplePostRequest $request
     * @return RedirectResponse
     */
    public function store(SamplePostRequest $request): RedirectResponse
    {
        $validated  = $request->validated();
        $sample     = new Sample();

        $this->crudService->save($sample, $validated);

        return redirect()->route('samples.index');
    }

    /**
     * @param SamplePostRequest $request
     * @param Sample $sample
     * @return RedirectResponse
     */
    public function update(SamplePostRequest $request, Sample $sample): RedirectResponse
    {
        $validated = $request->validated();

        $this->crudService->save($sample, $validated);

        return redirect()->route('samples.index');
    }

}