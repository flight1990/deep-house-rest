<?php

namespace App\Containers\Reviews\Tasks;

use App\Containers\Reviews\Repository\ReviewRepository;
use Illuminate\Database\Eloquent\Model;

class CreateReviewTask
{
    public function __construct(
        protected ReviewRepository $repository
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->repository->create($payload);
    }
}
