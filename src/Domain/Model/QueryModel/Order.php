<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Domain\Model\QueryModel;

final readonly class Order
{
    public function __construct(
        public string $field,
        public OrderType $type,
    ) {}
}
