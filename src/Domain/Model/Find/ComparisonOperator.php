<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Domain\Model\Find;

enum ComparisonOperator: string
{
    case Equal = '=';
    case NotEqual = '!=';
    case Greater = '>';
    case GreaterOrEqual = '>=';
    case Smaller = '<';
    case SmallerOrEqual = '<=';
}
