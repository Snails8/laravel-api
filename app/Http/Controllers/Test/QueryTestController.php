<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QueryTestController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->query();

        return view('_tests.query');
    }
}
// ------------------------------------------------------
//   http://localhost/query?fields=name,kana の場合
// ------------------------------------------------------
//  array:1 [▼
//      "fields" => "name,kana"
//  ]
// ------------------------------------------------------



// ------------------------------------------------------
// http://localhost/query?fields=name,kana&test=hoge,huga の場合
// ------------------------------------------------------
//  array:2 [▼
//      "fields" => "name,kana"
//      "test" => "hoge,huga"
//  ]
// ------------------------------------------------------