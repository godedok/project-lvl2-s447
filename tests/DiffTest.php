<?php

namespace Godedok\Tests;

use \PHPUnit\Framework\TestCase;
use function Godedok\genDiff;

class DifferTest extends TestCase
{
    /**
     * @dataProvider additionProvider
     */
    public function testGenDiff($expected, $json1, $json2)
    {
        $this->assertEquals($expected, genDiff($json1, $json2));
    }

    public function additionProvider()
    {
        return [
            [
                [
                    "host" => "hexlet.io",
                    "timeout1" => 20,
                    "timeout0" => 50,
                    "proxy0" => "123.234.53.22",
                    "verbose1" => true
                ],
                '{
                    "host": "hexlet.io",
                    "timeout": 50,
                    "proxy": "123.234.53.22"
                }',
                '{
                    "timeout": 20,
                    "verbose": true,
                    "host": "hexlet.io"
                }'
            ],
        ];
    }
}
