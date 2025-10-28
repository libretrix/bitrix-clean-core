<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Infrastructure\Repository\Sql;

final readonly class FindInfoBlockSQL implements SqlInterface
{
    public function __construct(
        /** @var Param[] */
        private array $params,
    ) {}

    public function __invoke(): SqlStatement
    {
        $sql = <<<'SQL'
            SELECT *
            FROM b_iblock AS b
            WHERE b.IBLOCK_TYPE_ID = :type
              AND b.CODE = :code
            SQL;

        return new SqlStatement($sql, $this->params);
    }
}
