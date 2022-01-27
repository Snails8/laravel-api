<?php

namespace App\Http\Controllers\Test;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class QueryTestController extends Controller
{
    public function index(Request $request)
    {
        $params = $request->query();


        return view('test.query');
    }
}
