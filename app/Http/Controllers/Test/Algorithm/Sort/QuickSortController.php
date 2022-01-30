<?php

namespace App\Http\Controllers\Test\Algorithm\Sort;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class QuickSortController extends Controller
{
    public function index(): View
    {
        $a = range(0, 100);

        shuffle($a);

        $this->quickSort(0, count($a) -1, $a);

        dd($a);


        return view('_tests.algorithm');
    }

    private function quickSort(int $start, int $end, array $array)
    {
        // ソートする必要がない場合
        if ($end <= $start || count($array) < 2) {
            return;
        }

        // 真ん中の値を設定
        $pivot = $array[(int)(($start + $end ) / 2)];

        // 両端をそれぞれ両端をそれぞれポインタとして定義
        [$left, $right] = [$start, $end];

        while (true) {
            while ($array[$left] < $pivot) {
                $left++;
            }

            while ($pivot < $array[$right]) {
                $right--;
            }

            if ($right <= $left) {
                break;
            }

            // $left と $right の値をスワップ
            [$array[$left], $arr[$right]] = [$array[$right], $array[$left]];
            // 交換したら1つ進める
            $left++;
            $right--;
        }

        // 左側に2つ以上要素が存在するなら再帰的にソート
        if ($start < $left-1) {
            $this->quickSort($start, $left-1, $arr);
        }

        // 右側に2つ以上要素が存在するなら再帰的にソート
        if ($right+1 < $end) {
            $this->quickSort($right+1, $end, $arr);
        }
    }
}
