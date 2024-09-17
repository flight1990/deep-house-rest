<?php

namespace App\Containers\Reviews\Actions;

use App\Containers\Reviews\Tasks\CreateReviewTask;
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
