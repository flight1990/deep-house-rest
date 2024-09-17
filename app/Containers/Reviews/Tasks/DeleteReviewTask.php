<?php

namespace App\Containers\Reviews\Tasks;

use App\Containers\Reviews\Repository\ReviewRepository;

class DeleteReviewTask
{
    public function __construct(
        protected ReviewRepository $repository
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
