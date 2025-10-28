<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Infrastructure\Repository\Sql;

final readonly class SqlStatement
{
    public function __construct(
        public string $sql,
        /** @var Param[] */
        public array $params,
    ) {}
}
