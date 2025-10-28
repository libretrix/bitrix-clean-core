<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Infrastructure\Repository\Sql;

use PDO;

enum PDOType: int
{
    case INT = PDO::PARAM_INT;
    case STRING = PDO::PARAM_STR;
    case BOOL = PDO::PARAM_BOOL;

    public static function fromValue(mixed $value): self
    {
        return match ($value) {
            is_int($value) => self::INT,
            is_string($value) => self::STRING,
            is_bool($value) => self::BOOL,
            default => self::STRING
        };
    }
}
