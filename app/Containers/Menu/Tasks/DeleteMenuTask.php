<?php

namespace App\Containers\Menu\Tasks;

use App\Containers\Menu\Repository\MenuRepository;

class DeleteMenuTask
{
    public function __construct(
        protected MenuRepository $repository
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
