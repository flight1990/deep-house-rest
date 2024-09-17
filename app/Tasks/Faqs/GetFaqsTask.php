<?php

namespace App\Tasks\Faqs;

use App\L5Repository\FaqRepository;
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
