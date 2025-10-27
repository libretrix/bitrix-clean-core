<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Application\Repository;

/** Это Data Access Interface */
interface FindAllByInterface
{
    /** @return Record[] */
    public function findAllBy(RepositoryQuery $query): array;
}
