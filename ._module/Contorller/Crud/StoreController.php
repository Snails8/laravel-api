<?php

namespace App\Http\Controllers\_Templates\Crud;

use App\Http\Controllers\Controller;
use App\Http\Requests\SamplePostRequest;
use App\Models\Sample;
use App\Services\CrudService;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    private CrudService $crudService;

    public function __construct(CrudService $crudService)
    {
        $this->crudService = $crudService;
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
}
