<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Domain\Model\Find;

final readonly class Result
{
    public function __construct(
        public Type $type,
        /** @var Criteria[] */
        public array $criteria,
        /** @var Order[] */
        public array $orders,
    ) {}
}
