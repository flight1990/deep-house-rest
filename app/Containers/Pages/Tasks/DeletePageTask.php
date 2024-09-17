<?php

namespace App\Containers\Pages\Tasks;

use App\Containers\Pages\Repository\PageRepository;

class DeletePageTask
{
    public function __construct(
        protected PageRepository $repository
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
