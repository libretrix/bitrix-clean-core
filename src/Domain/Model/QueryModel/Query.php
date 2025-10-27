<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Domain\Model\QueryModel;

final readonly class Query
{
    public function __construct(
        /** @var Criteria[] */
        public array $criteria,
        /** @var Order[] */
        public array $orders,
    ) {}
}
