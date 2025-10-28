<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Application\QueryModel;

enum OrderType: string
{
    case DESC = 'DESC';
    case ASC = 'ASC';
}
