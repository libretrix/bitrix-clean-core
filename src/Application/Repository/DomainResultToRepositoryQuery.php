<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Application\Repository;

use Libretrix\BitrixCleanCore\Application\Find\ComparisonOperator;
use Libretrix\BitrixCleanCore\Application\Find\Condition;
use Libretrix\BitrixCleanCore\Application\Find\Order;
use Libretrix\BitrixCleanCore\Application\Find\OrderType;
use Libretrix\BitrixCleanCore\Application\Find\Type;
use Libretrix\BitrixCleanCore\Domain\Model\Find\Criteria;
use Libretrix\BitrixCleanCore\Domain\Model\Find\Order as DomainOrder;
use Libretrix\BitrixCleanCore\Domain\Model\Find\Result;

final readonly class DomainResultToRepositoryQuery
{
    public function __construct(
        private Result $result,
        private int $limit,
        private int $offset,
    ) {}

    public function __invoke(): RepositoryQuery
    {
        return new RepositoryQuery(
            type: new Type($this->result->type->type, $this->result->type->code),
            criteria: array_map(static fn (Criteria $criteria): Condition => new Condition(
                field: $criteria->field,
                value: $criteria->value,
                operator: ComparisonOperator::from($criteria->operator->value),
            ), $this->result->criteria),
            orders: array_map(static fn (DomainOrder $order): Order => new Order(
                field: $order->field,
                type: OrderType::from($order->type->value),
            ), $this->result->orders),
            limit: $this->limit,
            offset: $this->offset,
        );
    }
}
