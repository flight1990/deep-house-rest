<?php

namespace App\Tasks;

use App\Repositories\Contracts\MenuRepositoryInterface;

class DeleteMenuTask
{
    public function __construct(
        protected MenuRepositoryInterface $menuRepository
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->menuRepository->delete($id);
    }
}
