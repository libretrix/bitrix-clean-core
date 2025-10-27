<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Domain\Model\InfoBlock;

use Libretrix\BitrixCleanCore\Domain\Model\Find\MapToInterface;
use Libretrix\BitrixCleanCore\Domain\Model\Find\Query;
use Libretrix\BitrixCleanCore\Domain\Model\Find\Result;
use Libretrix\BitrixCleanCore\Domain\Model\InfoBlock\Field\FieldCollection;
use Libretrix\BitrixCleanCore\Domain\Model\InfoBlock\Property\PropertyCollection;

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
