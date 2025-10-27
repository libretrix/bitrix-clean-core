<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Application\Repository;

use Libretrix\BitrixCleanCore\Domain\Exception\ValueNotFoundException;

final readonly class Record
{
    public function __construct(
        /** @var ValueInterface[] */
        private array $values,
    ) {}

    public function getValue(string $code): ValueInterface
    {
        // тут могут быть инварианты проверки кода

        return array_find(
            $this->values,
            static fn (ValueInterface $value): bool => $code === $value->code
        ) ?? throw new ValueNotFoundException($code);
    }
}
