<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Domain\Model\QueryModel;

final readonly class Type
{
    public function __construct(
        public string $type,
        public string $code,
    ) {}
}
