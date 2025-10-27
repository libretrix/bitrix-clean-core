<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Application\Find;

final readonly class Condition
{
    public function __construct(
        public string $field,
        public mixed $value,
        public ComparisonOperator $operator,
    ) {}
}
