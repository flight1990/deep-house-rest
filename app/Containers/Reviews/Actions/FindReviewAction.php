<?php

namespace App\Containers\Reviews\Actions;

use App\Containers\Reviews\Tasks\FindReviewTask;
use Illuminate\Database\Eloquent\Model;

class FindReviewAction
{
    public function __construct(
        protected FindReviewTask $findReviewTask
    )
    {
    }

    public function run(int $id): Model|null
    {
        return $this->findReviewTask->run($id);
    }
}
