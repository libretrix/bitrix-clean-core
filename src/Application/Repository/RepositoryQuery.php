<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Application\Repository;

use Libretrix\BitrixCleanCore\Application\UseCase\Input\Condition;
use Libretrix\BitrixCleanCore\Application\UseCase\Input\Order;
use Libretrix\BitrixCleanCore\Application\UseCase\Input\Type;

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
