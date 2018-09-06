<?php
declare(strict_types=1);

namespace TDD;

class InvalidChunksException extends \Exception
{
    public const ERROR_MESSAGE = 'Triangle cannot be built with provided chunks:';

    public function __construct(...$chunks)
    {
        parent::__construct(self::ERROR_MESSAGE.implode(',', $chunks), -1, null);
    }
}