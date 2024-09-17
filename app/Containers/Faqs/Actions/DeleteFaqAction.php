<?php

namespace App\Containers\Faqs\Actions;

use App\Containers\Faqs\Tasks\DeleteFaqTask;

class DeleteFaqAction
{
    public function __construct(
        protected DeleteFaqTask $deleteFaqTask
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->deleteFaqTask->run($id);
    }
}
