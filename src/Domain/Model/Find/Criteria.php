<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Domain\Model\Find;

final readonly class Criteria
{
    public function __construct(
        public string $field,
        public mixed $value,
        public ComparisonOperator $operator,
    ) {}
}
