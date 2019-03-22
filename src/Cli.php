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
    $firstFile = getData($args['<firstFile>']);
    $secondFile = getData($args['<secondFile>']);
    $diff = genDiff($firstFile, $secondFile);
    print_r($diff);
}
