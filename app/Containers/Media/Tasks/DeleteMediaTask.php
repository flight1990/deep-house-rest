<?php

namespace App\Containers\Media\Tasks;

use App\Containers\Media\Repository\MediaRepository;

class DeleteMediaTask
{
    public function __construct(
        protected MediaRepository $repository
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
