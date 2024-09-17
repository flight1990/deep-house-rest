<?php

namespace App\Containers\Faqs\Tasks;

use App\Containers\Faqs\Repository\FaqRepository;
use Illuminate\Database\Eloquent\Model;

class FindFaqTask
{
    public function __construct(
        protected FaqRepository $repository
    )
    {
    }

    public function run(int $id): Model
    {
        return $this->repository->findOrFail($id);
    }
}
