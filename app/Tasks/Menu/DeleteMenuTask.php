<?php

namespace App\Tasks\Menu;

use App\L5Repository\MenuRepository;

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
