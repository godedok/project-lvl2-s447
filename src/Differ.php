<?php

namespace Godedok;

use Funct\Collection;

function genDiff($json1, $json2)
{
    $arr1 = json_decode($json1, true);
    $arr2 = json_decode($json2, true);
    $array1 = array_map(function ($key) use ($arr1) {
        return $key . "0" . ":" . $arr1[$key];
    }, array_keys($arr1));
    $array2 = array_map(function ($key) use ($arr2) {
        return $key . "1" . ":" . $arr2[$key];
    }, array_keys($arr2));
    $result = array_merge($array1, $array2);
    $res = Collection\groupBy($result, function ($item) {
        return mb_substr(explode(':', $item)[0], 0, -1);
    });
    return $res;
}
