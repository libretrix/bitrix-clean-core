<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Domain\Model\InfoBlock;

use Libretrix\BitrixCleanCore\Domain\Model\InfoBlock\Field\FieldCollection;
use Libretrix\BitrixCleanCore\Domain\Model\InfoBlock\Property\PropertyCollection;
use Libretrix\BitrixCleanCore\Domain\Model\InfoBlock\Rules\RuleCriteria;
use Libretrix\BitrixCleanCore\Domain\Model\InfoBlock\Rules\RuleOrders;
use Libretrix\BitrixCleanCore\Domain\Model\QueryModel\MapToInterface;
use Libretrix\BitrixCleanCore\Domain\Model\QueryModel\Query;
use Libretrix\BitrixCleanCore\Domain\Model\QueryModel\Result;
use Libretrix\BitrixCleanCore\Domain\Model\QueryModel\Type;

final readonly class InfoBlock implements InfoBlockInterface
{
    public function __construct(
        public string $type,
        public string $code,
        public MapToInterface $mapConditions,
        public FieldCollection $fields,
        public PropertyCollection $properties,
    ) {}

    public function findAllBy(Query $query): Result
    {
        return new Result(
            type: new Type($this->type, $this->code),
            criteria: new RuleCriteria($this->mapConditions, $query->criteria)(),
            orders: new RuleOrders($this->mapConditions, $query->orders)(),
        );
    }
}
