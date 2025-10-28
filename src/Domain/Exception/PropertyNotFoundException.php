<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Domain\Exception;

use RuntimeException;

final class PropertyNotFoundException extends RuntimeException
{
    public function __construct(string $property)
    {
        parent::__construct(\sprintf('Свойство "%s" не найдено', $property));
    }
}
