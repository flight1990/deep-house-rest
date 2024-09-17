<?php

namespace App\Containers\Reviews\Tasks;

use App\Containers\Reviews\Repository\ReviewRepository;
use Illuminate\Database\Eloquent\Model;

class FindReviewTask
{
    public function __construct(
        protected ReviewRepository $repository
    )
    {
    }

    public function run(int $id): Model|null
    {
        return $this->repository->findOrFail($id);
    }
}
