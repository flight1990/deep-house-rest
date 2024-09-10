<?php

namespace App\Tasks\Reviews;

use App\L5Repository\ReviewRepository;
use Illuminate\Database\Eloquent\Model;

class UpdateReviewTask
{
    public function __construct(
        protected ReviewRepository $repository
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->repository->update($payload, $id);
    }
}
