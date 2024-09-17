<?php

namespace App\Containers\Faqs\Tasks;

use App\Containers\Faqs\Repository\FaqRepository;
use Illuminate\Database\Eloquent\Collection;

class GetFaqsTask
{
    public function __construct(
        protected FaqRepository $repository
    )
    {
    }

    public function run(): Collection
    {
        return $this->repository
            ->get();
    }
}
