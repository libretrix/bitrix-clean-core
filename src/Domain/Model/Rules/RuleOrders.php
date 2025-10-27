<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Domain\Model\Rules;

use Libretrix\BitrixCleanCore\Domain\Model\Find\MapToInterface;
use Libretrix\BitrixCleanCore\Domain\Model\Find\Order;
use Libretrix\BitrixCleanCore\Domain\Model\Find\OrderType;

final readonly class RuleOrders
{
    public function __construct(
        private MapToInterface $mapConditions,
        /** @var Order[] */
        private array $ordersIn
    ) {}

    /** @return Order[] */
    public function __invoke(): array
    {
        $orders = [];

        foreach ($this->ordersIn as $order) {
            if ($this->mapConditions->has($order->field)) {
                $orders[] = new Order(
                    field: $this->mapConditions->get($order->field)->to->code,
                    type: OrderType::from($order->type->value),
                );
            }
        }

        return $orders;
    }
}
