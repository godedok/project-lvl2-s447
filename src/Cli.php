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
    $firstFileContent = getData($args['<firstFile>']);
    $secondFileContent = getData($args['<secondFile>']);
    $diff = genDiff($firstFileContent, $secondFileContent);
    print_r($diff);
}
