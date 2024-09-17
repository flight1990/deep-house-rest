<?php

namespace App\Tasks\Faqs;

use App\L5Repository\FaqRepository;

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
