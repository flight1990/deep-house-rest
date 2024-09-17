<?php

namespace App\Containers\Faqs\Tasks;

use App\Containers\Faqs\Repository\FaqRepository;
use Illuminate\Database\Eloquent\Model;

class CreateFaqTask
{
    public function __construct(
        protected FaqRepository $repository
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->repository->create($payload);
    }
}
