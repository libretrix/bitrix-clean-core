<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Application\Find;

final readonly class Order
{
    public function __construct(
        public string $field,
        public OrderType $type,
    ) {}
}
