<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Application\UseCase\Map;

use Libretrix\BitrixCleanCore\Application\Repository\RepositoryQuery;
use Libretrix\BitrixCleanCore\Application\UseCase\Input\ComparisonOperator;
use Libretrix\BitrixCleanCore\Application\UseCase\Input\Condition;
use Libretrix\BitrixCleanCore\Application\UseCase\Input\Order;
use Libretrix\BitrixCleanCore\Application\UseCase\Input\OrderType;
use Libretrix\BitrixCleanCore\Application\UseCase\Input\Type;
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
