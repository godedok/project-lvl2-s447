<?php

namespace Godedok;

use function Godedok\getData;

function run()
{
    $doc = <<<DOC
Generate diff

Usage:
    gendiff (-h|--help)
    gendiff [--format <fmt>] <firstFile> <secondFile>

Options:
    -h --help                     Show this screen
    --format <fmt>                Report format [default: pretty]

DOC;

    $args = \Docopt::handle($doc);
    $pathToFirstFile = getData($args['<firstFile>']);
    $pathToSecondFile = getData($args['<secondFile>']);
    $diff = genDiff($pathToFirstFile, $pathToSecondFile);
    print_r($diff);
}
