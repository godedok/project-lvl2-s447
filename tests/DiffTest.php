<?php

namespace Godedok\Tests;

use \PHPUnit\Framework\TestCase;
use function Godedok\genDiff;

class DifferTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testGenDiff($expected, $json)
    {
        $this->assertEquals($expected, genDiff($json));
    }

    public function additionProvider()
    {
        return [
            [
                [
                    "host" => "hexlet.io",
                    "timeout" => 50,
                    "proxy" => "123.234.53.22"
                ],
                '{
                    "host": "hexlet.io",
                    "timeout": 50,
                    "proxy": "123.234.53.22"
                }'
            ],
        ];
    }
}
