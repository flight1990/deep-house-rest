<?php

namespace App\Containers\Faqs\Tasks;

use App\Containers\Faqs\Repository\FaqRepository;

class DeleteFaqTask
{
    public function __construct(
        protected FaqRepository $repository
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
