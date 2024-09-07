<?php

namespace App\Tasks\Pages;

use App\Repositories\Contracts\PageRepositoryInterface;

class DeletePageTask
{
    public function __construct(
        protected PageRepositoryInterface $repository
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
