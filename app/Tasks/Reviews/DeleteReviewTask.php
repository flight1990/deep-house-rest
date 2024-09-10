<?php

namespace App\Tasks\Reviews;

use App\L5Repository\ReviewRepository;

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
