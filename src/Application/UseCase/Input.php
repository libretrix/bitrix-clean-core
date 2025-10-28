<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Application\UseCase;

use Libretrix\BitrixCleanCore\Application\QueryModel\Condition;
use Libretrix\BitrixCleanCore\Application\QueryModel\Order;

final readonly class Input
{
    public function __construct(
        public string $type,
        /** @var Condition[] */
        public array $conditions,
        /** @var Order[] */
        public array $orders,
        public int $limit,
        public int $offset,
    ) {}
}
