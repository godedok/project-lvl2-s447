<?php

namespace Godedok\Tests;

use \PHPUnit\Framework\TestCase;
use function Godedok\genDiff;
use function Godedok\getData;

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
        $beforeData = getData('tests/data/before.json');
        $afterData = getData('tests/data/after.json');

        return [
            [$expected, $beforeData, $afterData],
        ];
    }
}
