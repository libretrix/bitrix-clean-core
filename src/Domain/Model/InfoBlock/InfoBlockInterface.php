<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Domain\Model\InfoBlock;

use Libretrix\BitrixCleanCore\Domain\Model\InfoBlock\Field\FieldCollection;
use Libretrix\BitrixCleanCore\Domain\Model\InfoBlock\Property\PropertyCollection;
use Libretrix\BitrixCleanCore\Domain\Model\QueryModel\MapToInterface;
use Libretrix\BitrixCleanCore\Domain\Model\QueryModel\Query;
use Libretrix\BitrixCleanCore\Domain\Model\QueryModel\Result;

interface InfoBlockInterface
{
    public string $type {
        get;
    }

    public string $code {
        get;
    }

    public FieldCollection $fields {
        get;
    }

    public PropertyCollection $properties {
        get;
    }

    public MapToInterface $mapConditions {
        get;
    }

    public function findAllBy(Query $query): Result;
}
