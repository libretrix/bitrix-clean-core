<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Application\Repository;

use Libretrix\BitrixCleanCore\Domain\Model\InfoBlock\GetCodeInterface;

interface ValueInterface extends GetCodeInterface
{
    public mixed $value {
        get;
    }
}
