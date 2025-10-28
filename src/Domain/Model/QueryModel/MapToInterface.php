<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Domain\Model\QueryModel;

interface MapToInterface
{
    public function has(string $field): bool;

    public function get(string $field): FieldTo;
}
