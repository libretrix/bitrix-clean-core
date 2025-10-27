<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Domain\Exception;

use RuntimeException;

final class ValueNotFoundException extends RuntimeException
{
    public function __construct(string $code)
    {
        parent::__construct(\sprintf('Значение "%s" не найдено', $code));
    }
}
