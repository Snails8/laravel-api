<?php

namespace App\Http\Controllers\Test\Algorithm;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ArrayController extends Controller
{
    public function index(): View
    {

        $result = $this->getArrayUnique(true);

        dd($result);

        return view('_tests.algorithm');
    }

    private function getArrayUnique(bool $string)
    {
        if ($string) {
            $array = ["one", "two", "three","two"];
        } else {
            $array = [1, "1", 2, "2"];
        }

        $result = array_unique($array);

        return $result;
    }
}
