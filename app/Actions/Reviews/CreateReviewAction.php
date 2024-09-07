<?php

namespace App\Actions\Reviews;

use App\Tasks\Reviews\CreateReviewTask;
use Illuminate\Database\Eloquent\Model;

class CreateReviewAction
{
    public function __construct(
        protected CreateReviewTask $createReviewTask
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->createReviewTask->run($payload);
    }
}
