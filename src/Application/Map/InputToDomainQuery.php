<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Application\Map;

use Libretrix\BitrixCleanCore\Application\QueryModel\Condition;
use Libretrix\BitrixCleanCore\Application\QueryModel\Order;
use Libretrix\BitrixCleanCore\Application\UseCase\Input;
use Libretrix\BitrixCleanCore\Domain\Model\QueryModel\ComparisonOperator;
use Libretrix\BitrixCleanCore\Domain\Model\QueryModel\Criteria as DomainCondition;
use Libretrix\BitrixCleanCore\Domain\Model\QueryModel\Order as DomainOrder;
use Libretrix\BitrixCleanCore\Domain\Model\QueryModel\OrderType;
use Libretrix\BitrixCleanCore\Domain\Model\QueryModel\Query;

final readonly class InputToDomainQuery
{
    public function __construct(private Input $input) {}

    public function __invoke(): Query
    {
        return new Query(
            criteria: array_map(static fn (Condition $condition): DomainCondition => new DomainCondition(
                field: $condition->field,
                value: $condition->value,
                operator: ComparisonOperator::from($condition->operator->value)
            ), $this->input->conditions),
            orders: array_map(static fn (Order $order): DomainOrder => new DomainOrder(
                field: $order->field,
                type: OrderType::from($order->type->value),
            ), $this->input->orders)
        );
    }
}
