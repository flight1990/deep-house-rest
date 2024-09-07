<?php

namespace App\Tasks\Reviews;

use App\Repositories\Contracts\ReviewRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class FindReviewTask
{
    public function __construct(
        protected ReviewRepositoryInterface $repository
    )
    {
    }

    public function run(int $id): Model|null
    {
        return $this->repository->findById($id);
    }
}
