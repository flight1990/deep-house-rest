<?php

namespace App\Containers\Reviews\Actions;

use App\Containers\Reviews\Tasks\UpdateReviewTask;
use Illuminate\Database\Eloquent\Model;

class UpdateReviewAction
{
    public function __construct(
        protected UpdateReviewTask $updateReviewTask,
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->updateReviewTask->run($payload, $id);
    }
}
