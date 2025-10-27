<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Domain\Model\InfoBlock;

interface ValueInterface extends GetCodeInterface
{
    public function getValue(): mixed;
}
