<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Application\Output;

final class OutputModel
{
    public function __construct(
        /** @var OutputValue[] */
        public array $values,
    ) {}
}
