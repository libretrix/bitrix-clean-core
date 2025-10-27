<?php

declare(strict_types=1);

namespace Libretrix\BitrixCleanCore\Application\IBlock;

use Libretrix\BitrixCleanCore\Application\Find\Input;
use Libretrix\BitrixCleanCore\Application\Find\InputToDomainQuery;
use Libretrix\BitrixCleanCore\Application\IBlock\Output\Output;
use Libretrix\BitrixCleanCore\Application\Repository\DomainResultToRepositoryQuery;
use Libretrix\BitrixCleanCore\Application\Repository\FindAllByInterface;
use Libretrix\BitrixCleanCore\Domain\Model\InfoBlock\InfoBlockInterface;

final readonly class FindAllByUseCase
{
    public function __construct(
        private InfoBlockInterface $infoBlock,
        private FindAllByInterface $repository,
    ) {}

    public function execute(Input $request): Output
    {
        return new DomainRecordsToOutput($this->repository->findAllBy(
            new DomainResultToRepositoryQuery(
                result: $this->infoBlock->findAllBy(new InputToDomainQuery($request)()),
                limit: $request->limit,
                offset: $request->offset
            )()
        ), ['name', 'code'])();
    }
}
