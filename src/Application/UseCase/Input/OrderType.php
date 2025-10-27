<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Application\UseCase\Input;

enum OrderType: string
{
    case DESC = 'DESC';
    case ASC = 'ASC';
}
