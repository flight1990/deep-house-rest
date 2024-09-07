<?php

namespace App\Actions\Reviews;

use App\Tasks\Reviews\FindReviewTask;
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
