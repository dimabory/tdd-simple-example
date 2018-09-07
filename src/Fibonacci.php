<?php
declare(strict_types=1);

namespace TDD;


/**
 * Calculates fibonacci number by Binet's formula:
 * @link https://en.wikipedia.org/wiki/Jacques_Philippe_Marie_Binet
 */
class Fibonacci
{
    private $n;

    public function __construct(int $n)
    {
        $this->n = $n;
    }

    public function __invoke(): int
    {
        if ($this->n === 0) {
            return 0;
        }

        if ($this->n <= 2) {
            return 1;
        }

        return (int)round((((1 + sqrt(5)) / 2) ** $this->n - ((1 - sqrt(5)) / 2) ** $this->n) / sqrt(5));
    }
}