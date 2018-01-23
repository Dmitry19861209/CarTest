<?php

namespace App\Http\Controllers;

use App\Helpers\RecList\Cons;
use App\Helpers\RecList\Nil;
use function foo\func;
use Illuminate\Http\Request;
use App\Http\Requests;
use PhpParser\Node\Expr\List_;

class TestController extends Controller
{
    public function index()
    {
        /*
         * Функция list()
         * Замечание: работает только с индексированными массивами и принимает числовые индексы начиная с 0.
         * */
        $str = array('кофе', 'коричневый', 'кофеин');
        $nums = [1, 2, 3];

        list($one, $two, $three) = $nums;
//        dd($one);


        list($a[0], $a[1], $a[2]) = $str;
//        dd($a);

        $listClass = new List_(['one', 'two', 'three'], [1, 2, 3]);
        dd($listClass);

        return 1;
    }

    public function recListTest()
    {
        $list = recList([1, 2, 3]);
        $listString = recList(["a", "a", "a", "b", "c", "c"]);

//        $res = $list->map(function ($i) {
//            return $i * 2;
//        });
//
//        $res = $list->foldLeft(1, function ($a, $b) {
//            return $a + $b;
//        });

//        $res = $list->foldRight(0, function ($a, $b) {
//            return $a + $b;
//        });

//        $res = $list->filter(function ($i) {
//            return $i >= 2;
//        });
//
//        $res = $listString->span(function ($i) {
//            return $i === "a";
//        });

//        dd($list->concat(4));
        dd($list->concat(recList([4, 5])));
//        dd($listString->concat(recList(["d", "d"])));

//        dd($this->encode($listString));
//        dd($this->pack($listString));

//        dd($list->length());
//        dd($res);

//        return $res;
    }

    function pack($xs)
    {
        if (get_class($xs) === "App\Helpers\RecList\Nil") {
            return new Nil;
        } else {
            list($first, $rest) = $xs->span(function ($i) use($xs) {
                return $i === $xs->head();
            });

            return new Cons($first, $this->pack($rest));
        }
    }

    public function encode($xs)
    {
        return $this->pack($xs)->map(function ($i) {
            return [$i->head(), $i->length()];
        });
    }
}
