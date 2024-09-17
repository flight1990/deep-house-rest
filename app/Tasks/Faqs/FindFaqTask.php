<?php

namespace App\Tasks\Faqs;

use App\L5Repository\FaqRepository;
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
