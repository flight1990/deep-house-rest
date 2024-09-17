<?php

namespace App\Containers\Faqs\Tasks;

use App\Containers\Faqs\Repository\FaqRepository;
use Illuminate\Database\Eloquent\Model;

class UpdateFaqTask
{
    public function __construct(
        protected FaqRepository $repository
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->repository->update($payload, $id);
    }
}
