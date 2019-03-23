<?php

namespace Godedok;

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
    $diff = genDiff($args['<firstFile>'], $args['<secondFile>']);
    print_r($diff);
}
