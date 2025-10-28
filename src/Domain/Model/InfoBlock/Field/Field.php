<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Domain\Model\InfoBlock\Field;

use Libretrix\BitrixCleanCore\Domain\Model\InfoBlock\GetCodeInterface;

final class Field implements GetCodeInterface
{
    public function __construct(public string $code) {}
}
