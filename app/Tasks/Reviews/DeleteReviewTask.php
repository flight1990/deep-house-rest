<?php

namespace App\Tasks\Reviews;

use App\Repositories\Contracts\ReviewRepositoryInterface;

class DeleteReviewTask
{
    public function __construct(
        protected ReviewRepositoryInterface $repository
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
