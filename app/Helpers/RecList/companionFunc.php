<?php
/**
 * @author Derzhaev Dmitry
 * @example
 * Эта функция представлена в роли объекта-компаньона для RecList.
 */

use App\Helpers\RecList\Cons;
use App\Helpers\RecList\Nil;

/**
 * @param array $array
 * @return \App\Helpers\RecList\RecList
 * */
function recList(array $array)
{
    if (!count($array)) {
        return new Nil;
    }

    return new Cons(array_shift($array), recList($array));
}