<?php

namespace App\Tasks\Reviews;

use App\Repositories\Contracts\ReviewRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UpdateReviewTask
{
    public function __construct(
        protected ReviewRepositoryInterface $repository
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->repository->update($payload, $id);
    }
}
