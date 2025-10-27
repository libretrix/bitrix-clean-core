<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Application\UseCase\Output;

final class Output
{
    public function __construct(
        /** @var OutputModel[] */
        public array $models,
    ) {}
}
