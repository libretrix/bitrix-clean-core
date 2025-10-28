<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Infrastructure\Repository\Sql;

final class Param
{
    public function __construct(
        public string $name,
        public string $value,
        public PDOType $typeMap,
    ) {}
}
