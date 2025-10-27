<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Application\Repository;

use Libretrix\BitrixCleanCore\Application\Find\Condition;
use Libretrix\BitrixCleanCore\Application\Find\Order;
use Libretrix\BitrixCleanCore\Application\Find\Type;

final class RepositoryQuery
{
    public function __construct(
        public Type $type,
        /** @var Condition[] */
        public array $criteria,
        /** @var Order[] */
        public array $orders,
        public int $limit,
        public int $offset,
    ) {}
}
