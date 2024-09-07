<?php

namespace App\Actions\Reviews;

use App\Tasks\Reviews\UpdateReviewTask;
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
