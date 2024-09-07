<?php

namespace App\Tasks\Reviews;

use App\Repositories\Contracts\ReviewRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CreateReviewTask
{
    public function __construct(
        protected ReviewRepositoryInterface $repository
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->repository->create($payload);
    }
}
