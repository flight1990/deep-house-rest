<?php

namespace App\Containers\Reviews\Actions;

use App\Containers\Reviews\Tasks\DeleteReviewTask;

class DeleteReviewAction
{
    public function __construct(
        protected DeleteReviewTask $deleteReviewTask
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->deleteReviewTask->run($id);
    }
}
