<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Domain\Model\InfoBlock\Property;

use Libretrix\BitrixCleanCore\Domain\Model\InfoBlock\GetCodeInterface;

final readonly class Property implements GetCodeInterface
{
    public function __construct(public string $code) {}
}
