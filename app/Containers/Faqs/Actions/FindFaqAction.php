<?php

namespace App\Containers\Faqs\Actions;

use App\Containers\Faqs\Tasks\FindFaqTask;
use Illuminate\Database\Eloquent\Model;

class FindFaqAction
{
    public function __construct(
        protected FindFaqTask $findFaqTask
    )
    {
    }

    public function run(int $id): Model|null
    {
        return $this->findFaqTask->run($id);
    }
}
