<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index(): View
    {
        $title = '';
        $description = '';

        $data = [
            'title' => $title,
            'description' => $description,
        ];

        return view('admin.company.index', $data);
    }
}
