<?php

namespace Godedok;

use Funct\Collection;

function genDiff($data1, $data2)
{
    return '';
}

function getData(string $pathToFile): array
{
    $content = file_get_contents($pathToFile);
    return json_decode($content, true);
}
