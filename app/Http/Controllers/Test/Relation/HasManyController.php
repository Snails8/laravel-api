<?php

namespace App\Http\Controllers\Test\Relation;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class HasManyController extends Controller
{
    public function index(): View
    {
        $newsLists = News::query()->with(['newsCategory'])->get();

        return view('_tests.relation');
    }
}
