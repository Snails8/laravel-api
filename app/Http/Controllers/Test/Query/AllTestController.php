<?php

namespace App\Http\Controllers\Test\Query;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AllTestController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->all();

//        dd($params);

        return view('_tests.query');
    }
}

//  http://localhost/all?fields=name,title
//  array:1 [▼
//      "fields" => "name,title"
//  ]