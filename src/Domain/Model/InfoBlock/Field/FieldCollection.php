<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Domain\Model\InfoBlock\Field;

use Libretrix\BitrixCleanCore\Domain\Exception\FieldNotFoundException;

final readonly class FieldCollection
{
    public function __construct(
        /** @var Field[] */
        private array $fields,
    ) {}

    public function findByCode(string $code): Field
    {
        return array_find(
            $this->fields,
            static fn (Field $field): bool => $code === $field->code
        ) ?? throw new FieldNotFoundException($code);
    }
}
