<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Application\IBlock;

use Libretrix\BitrixCleanCore\Application\IBlock\Output\Output;
use Libretrix\BitrixCleanCore\Application\IBlock\Output\OutputModel;
use Libretrix\BitrixCleanCore\Application\IBlock\Output\OutputValue;
use Libretrix\BitrixCleanCore\Application\Repository\Record;

final readonly class DomainRecordsToOutput
{
    public function __construct(
        /** @var Record[] */
        private array $domainRecords,
        /** @var string[] */
        private array $fields,
    ) {}

    public function __invoke(): Output
    {
        return new Output(
            array_map(fn (Record $record): OutputModel => new OutputModel(
                array_map(fn (string $name): OutputValue => new OutputValue(
                    name: $name,
                    value: $record->getValue($name)
                ), $this->fields)
            ), $this->domainRecords)
        );
    }
}
