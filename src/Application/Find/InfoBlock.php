<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Application\Find;

final readonly class InfoBlock
{
    public function __construct(
        public string $type,
        public string $code,
    ) {}
}
