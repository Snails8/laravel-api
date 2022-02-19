<?php

namespace App\Http\Controllers\_Templates\Crud;

use App\Http\Controllers\Controller;
use App\Http\Requests\SamplePostRequest;
use App\Models\Sample;
use App\Services\CrudService;
use Illuminate\Http\RedirectResponse;

class UpdateController extends Controller
{
    private CrudService $crudService;

    public function __construct(CrudService $crudService)
    {
        $this->crudService = $crudService;
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