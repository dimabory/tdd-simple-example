<?php
declare(strict_types=1);

namespace TDD;

class Triangle
{
    public const EQUILATERAL_TYPE_ID = 1;
    public const ISOSCELES_TYPE_ID   = 2;
    public const UNJUSTIFIED_TYPE_ID = 3;

    private $a;
    private $b;
    private $c;

    /**
     * @throws \InvalidArgumentException
     * @throws InvalidChunksException
     */
    public function __construct($a, $b, $c)
    {
        $this->assertArgs($a, $b, $c);
        $this->assertChunksToBuiltTriangle($a, $b, $c);

        $this->a = $a;
        $this->b = $b;
        $this->c = $c;
    }

    public function type(): int
    {
        if ($this->isEquilateral()) {
            return self::EQUILATERAL_TYPE_ID;
        }
        if ($this->isIsosceles()) {
            return self::ISOSCELES_TYPE_ID;
        }

        return self::UNJUSTIFIED_TYPE_ID;
    }

    private function isEquilateral(): bool
    {
        return $this->a === $this->b && $this->b === $this->c && $this->c === $this->a;
    }

    private function isIsosceles(): bool
    {
        return $this->a === $this->b || $this->b === $this->c || $this->c === $this->a;
    }

    private function assertArgs(...$chunks): void
    {
        $isNotNumeric = array_filter(
            $chunks,
            function ($arg) {
                return !is_numeric($arg) || $arg <= 0;
            }
        );

        if ($isNotNumeric) {
            throw new \InvalidArgumentException('Triangle can be built only with positive numeric values.');
        }
    }

    private function assertChunksToBuiltTriangle($a, $b, $c): void
    {
        if (!($a < $b + $c && $b < $a + $c && $c < $a + $b)) {
            throw new InvalidChunksException($a, $b, $c);
        }
    }
}