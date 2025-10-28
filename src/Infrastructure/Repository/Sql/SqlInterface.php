<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Infrastructure\Repository\Sql;

interface SqlInterface
{
    public function __invoke(): SqlStatement;
}
