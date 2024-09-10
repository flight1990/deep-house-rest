<?php

namespace App\Tasks\Pages;

use App\L5Repository\PageRepository;

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
