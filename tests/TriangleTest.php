<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use TDD\InvalidChunksException;
use TDD\Triangle;

final class TriangleTest extends TestCase
{
    public function testEquilateral()
    {
        $triangle = new Triangle(1, 1, 1);

        $this->assertSame(Triangle::EQUILATERAL_TYPE_ID, $triangle->type(), 'Triangle should be equilateral');
    }

    /**
     * @dataProvider isoscelesTriangleDataProvider
     */
    public function testIsosceles(...$chunks)
    {
        $triangle = new Triangle(...$chunks);

        $this->assertSame(Triangle::ISOSCELES_TYPE_ID, $triangle->type(), 'Triangle should be isosceles');
    }

    public function testValidity()
    {
        $triangle = new Triangle(2, 4, 5);

        $this->assertSame(
            Triangle::UNJUSTIFIED_TYPE_ID,
            $triangle->type(),
            'Triangle should be valid with provided chunks'
        );
    }

    public function testInvalidity()
    {
        $this->expectException(InvalidChunksException::class);

        new Triangle(8, 2, 3);
    }

    /**
     * @dataProvider invalidArgsDataProvider
     */
    public function testArgs(...$chunks)
    {
        $this->expectException(\InvalidArgumentException::class);

        new Triangle(...$chunks);
    }

    public function isoscelesTriangleDataProvider()
    {
        return [
            [1, 2, 2],
            [2, 2, 1],
            [2, 1, 2],
        ];
    }

    public function invalidArgsDataProvider()
    {
        return [
            [null, 2, 3],
            ['string', 2, 2],
            [2, false, 5],
            [2, 2, new \stdClass()],
            [0, 0, 0],
            [0, 1, 3],
            [1, 0, 3],
            [1, 1, 0],
            [-1, 1, 1],
            [1, -1, 1],
            [1, 1, -INF],
            ['-1', 1, 2],
        ];
    }
}