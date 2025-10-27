<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Application\UseCase\Input;

final class Type
{
    public function __construct(
        public string $type,
        public string $code,
    ) {}
}
