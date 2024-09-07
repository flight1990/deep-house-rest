<?php

namespace App\Actions\Reviews;

use App\Tasks\Reviews\DeleteReviewTask;

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
