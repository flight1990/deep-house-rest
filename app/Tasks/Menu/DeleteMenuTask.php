<?php

namespace App\Tasks\Menu;

use App\Repositories\Contracts\MenuRepositoryInterface;

class DeleteMenuTask
{
    public function __construct(
        protected MenuRepositoryInterface $repository
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
