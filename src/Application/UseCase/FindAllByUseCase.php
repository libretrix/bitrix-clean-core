<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Application\UseCase;

use Libretrix\BitrixCleanCore\Application\Map\DomainResultToRepositoryQuery;
use Libretrix\BitrixCleanCore\Application\Map\InputToDomainQuery;
use Libretrix\BitrixCleanCore\Application\Map\RecordsToOutput;
use Libretrix\BitrixCleanCore\Application\Output\Output;
use Libretrix\BitrixCleanCore\Application\Repository\FindAllByInterface;
use Libretrix\BitrixCleanCore\Domain\Model\InfoBlock\InfoBlockInterface;

final readonly class FindAllByUseCase
{
    public function __construct(
        private InfoBlockInterface $infoBlock,
        private FindAllByInterface $repository,
    ) {}

    public function execute(Input $input): Output
    {
        return new RecordsToOutput($this->repository->findAllBy(
            new DomainResultToRepositoryQuery(
                result: $this->infoBlock->findAllBy(new InputToDomainQuery($input)()),
                limit: $input->limit,
                offset: $input->offset
            )()
        ), ['name', 'code'])();
    }
}
