<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Domain\Exception;

use RuntimeException;

final class FieldNotFoundException extends RuntimeException
{
    public function __construct(string $field)
    {
        parent::__construct(\sprintf('Поле "%s" не найдено', $field));
    }
}
