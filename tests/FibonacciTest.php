<?php
declare(strict_types=1);

namespace Tests;

use PHPUnit\Framework\TestCase;
use TDD\Fibonacci;

class FibonacciTest extends TestCase
{
    /**
     * @dataProvider numberDataProvider
     */
    public function testFibonacci($n, $expected)
    {
        $fib = new Fibonacci($n);

        $this->assertSame($expected, $fib());
    }

    public function fibonacciDataProvider(): array
    {
        return [
            [0, 0],
            [1, 1],
            [2, 1],
            [3, 2],
            [4, 3],
            [5, 5],
            [6, 8],
            [7, 13],
            [8, 21],
            [9, 34],
            [10, 55],
            [11, 89],
            [21, 10946],
            [22, 17711],
            [67, 44945570212853],
        ];
    }
}