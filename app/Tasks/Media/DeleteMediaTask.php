<?php

namespace App\Tasks\Media;

use App\L5Repository\MediaRepository;

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
