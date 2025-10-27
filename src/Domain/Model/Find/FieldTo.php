<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Domain\Model\Find;

use Libretrix\BitrixCleanCore\Domain\Model\InfoBlock\GetCodeInterface;

final class FieldTo
{
    public function __construct(
        public string $field,
        public GetCodeInterface $to,
    ) {}
}
