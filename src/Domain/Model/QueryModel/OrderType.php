<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Domain\Model\QueryModel;

enum OrderType: string
{
    case DESC = 'DESC';
    case ASC = 'ASC';
}
