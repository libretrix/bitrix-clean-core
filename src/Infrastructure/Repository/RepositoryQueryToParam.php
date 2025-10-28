<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Infrastructure\Repository;

use Libretrix\BitrixCleanCore\Application\QueryModel\Condition;
use Libretrix\BitrixCleanCore\Application\QueryModel\Order;
use Libretrix\BitrixCleanCore\Application\Repository\RepositoryQuery;
use Libretrix\BitrixCleanCore\Infrastructure\Repository\Sql\Param;
use Libretrix\BitrixCleanCore\Infrastructure\Repository\Sql\PDOType;

final readonly class RepositoryQueryToParam
{
    public function __construct(
        private RepositoryQuery $query,
    ) {}

    /** @return Param[] */
    public function __invoke(): array
    {
        return [
            new Param('type',  $this->query->type->type, PDOType::STRING),
            new Param('code',  $this->query->type->code, PDOType::STRING),
            ...array_map(
                static fn (Condition $condition): Param => new Param($condition->field,  $condition->value, PDOType::fromValue($condition->value)),
                $this->query->criteria
            ),
            ...array_map(
                static fn (Order $order): Param => new Param($order->field,  $order->type->value, PDOType::STRING),
                $this->query->orders
            ),
        ];
    }
}
