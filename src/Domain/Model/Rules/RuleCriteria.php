<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Domain\Model\Rules;

use Libretrix\BitrixCleanCore\Domain\Model\Find\ComparisonOperator;
use Libretrix\BitrixCleanCore\Domain\Model\Find\Criteria;
use Libretrix\BitrixCleanCore\Domain\Model\Find\MapToInterface;

final readonly class RuleCriteria
{
    public function __construct(
        private MapToInterface $mapConditions,
        /** @var Criteria[] */
        private array $conditions
    ) {}

    /** @return Criteria[] */
    public function __invoke(): array
    {
        $criteria = [];

        foreach ($this->conditions as $condition) {
            if ($this->mapConditions->has($condition->field)) {
                $criteria[] = new Criteria(
                    field: $this->mapConditions->get($condition->field)->to->code,
                    value: $condition->value,
                    operator: ComparisonOperator::from($condition->operator->value)
                );
            }
        }

        return $criteria;
    }
}
