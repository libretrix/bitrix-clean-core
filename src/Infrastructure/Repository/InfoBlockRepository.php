<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Infrastructure\Repository;

use Libretrix\BitrixCleanCore\Application\Repository\FindAllByInterface;
use Libretrix\BitrixCleanCore\Application\Repository\Record;
use Libretrix\BitrixCleanCore\Application\Repository\RepositoryQuery;
use Libretrix\BitrixCleanCore\Application\Repository\Value;
use Libretrix\BitrixCleanCore\Infrastructure\Repository\Sql\FindInfoBlockSQL;
use PDO;

final readonly class InfoBlockRepository implements FindAllByInterface
{
    public function __construct(
        private PDO $pdo
    ) {}

    public function findAllBy(RepositoryQuery $query): array
    {
        $statement = new FindInfoBlockSQL(new RepositoryQueryToParam($query)())();

        $stmt = $this->pdo->prepare($statement->sql);
        foreach ($statement->params as $name => $value) {
            $stmt->bindValue(':' . $name, $value);
        }

        $stmt->execute();

        return array_map(
            static fn (array $row): Record => new Record(
                array_map(static fn (mixed $value, string $code): Value => new Value($code, $value),
                    $row, array_keys($row)
                )
            ),$stmt->fetchAll(PDO::FETCH_ASSOC)
        );
    }
}
