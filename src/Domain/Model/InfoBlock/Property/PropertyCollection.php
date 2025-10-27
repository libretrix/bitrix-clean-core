<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Domain\Model\InfoBlock\Property;

use Libretrix\BitrixCleanCore\Domain\Exception\PropertyNotFoundException;

final readonly class PropertyCollection
{
    public function __construct(
        /** @var Property[] */
        private array $properties,
    ) {}

    public function findByCode(string $code): Property
    {
        return array_find(
            $this->properties,
            static fn (Property $property): bool => $code === $property->code
        ) ?? throw new PropertyNotFoundException($code);
    }
}
