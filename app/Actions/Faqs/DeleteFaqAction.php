<?php

namespace App\Actions\Faqs;

use App\Tasks\Faqs\DeleteFaqTask;

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
