<?php

namespace App\Containers\Faqs\Actions;

use App\Containers\Faqs\Tasks\GetFaqsTask;
use Illuminate\Database\Eloquent\Collection;

class GetFaqsAction
{
    public function __construct(
        protected GetFaqsTask $getFaqsTask
    )
    {
    }

    public function run(?array $params = []): Collection
    {
        return $this->getFaqsTask->run();
    }
}
