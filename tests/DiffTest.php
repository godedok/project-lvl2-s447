<?php

namespace Godedok\Tests;

use \PHPUnit\Framework\TestCase;
use function Godedok\genDiff;

class DifferTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testGenDiff($expected, $beforeDataPath, $afterDataPath)
    {
        $this->assertEquals($expected, genDiff($beforeDataPath, $afterDataPath));
    }

    public function additionProvider()
    {
        $expected = file_get_contents('tests/data/diffJson');

        return [
            [
                $expected,
                'tests/data/before.json',
                'tests/data/after.json'
            ],
            [
                $expected,
                'tests/data/before.yaml',
                'tests/data/after.yaml'
            ],
        ];
    }
}
