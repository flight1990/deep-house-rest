<?php

namespace App\Tasks;

use App\Repositories\Contracts\PageRepositoryInterface;

class DeletePageTask
{
    public function __construct(
        protected PageRepositoryInterface $pageRepository
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->pageRepository->delete($id);
    }
}
