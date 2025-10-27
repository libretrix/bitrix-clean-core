<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Application\UseCase\Input;

enum ComparisonOperator: string
{
    case Equal = '=';
    case NotEqual = '!=';
    case Greater = '>';
    case GreaterOrEqual = '>=';
    case Smaller = '<';
    case SmallerOrEqual = '<=';
}
