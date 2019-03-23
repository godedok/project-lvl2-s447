<?php

namespace Godedok\Tests;

use \PHPUnit\Framework\TestCase;
use function Godedok\genDiff;

class DifferTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testGenDiff($expected, $beforeData, $afterData)
    {
        $this->assertEquals($expected, genDiff($beforeData, $afterData));
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
        ];
    }
}
