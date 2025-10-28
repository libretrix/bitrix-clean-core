<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Application\Output;

final readonly class OutputValue
{
    public function __construct(
        public string $name,
        public mixed $value,
    ) {}
}
