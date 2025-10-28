<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Application\Repository;

final readonly class Value implements ValueInterface
{
    public function __construct(public string $code, public mixed $value) {}
}
