<?php

namespace Godedok;

use Symfony\Component\Yaml\Yaml;

function genDiff($filePath1, $filePath2): string
{
    $data1 = getData($filePath1);
    $data2 = getData($filePath2);
    $diff = calcDiff($data1, $data2);
    $result = '{' . PHP_EOL;
    foreach ($diff as $key => $value) {
        $result .= '  ' . $key . ': ' . json_encode($value) . PHP_EOL;
    }
    $result .= '}';
    return $result;
}

function calcDiff(array $data1, array $data2): array
{
    $keysData = array_unique(array_merge(array_keys($data1), array_keys($data2)));
    return array_reduce($keysData, function ($carry, $key) use ($data1, $data2) {
        if (array_key_exists($key, $data1) && array_key_exists($key, $data2)) {
            if ($data1[$key] == $data2[$key]) {
                $carry["  " . $key] = $data1[$key];
            } else {
                $carry["- " . $key] = $data1[$key];
                $carry["+ " . $key] = $data2[$key];
            }
        } elseif (array_key_exists($key, $data1)) {
            $carry["- " . $key] = $data1[$key];
        } else {
            $carry["+ " . $key] = $data2[$key];
        }
        return $carry;
    });
}

function getData(string $pathToFile): array
{
    $content = file_get_contents($pathToFile);
    $fileExtension = pathinfo($pathToFile, PATHINFO_EXTENSION);
    switch ($fileExtension) {
        case 'json':
            return json_decode($content, true);
        case 'yaml':
        case 'yml':
            return Yaml::parse($content);
    }
}
