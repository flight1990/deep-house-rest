<?php

namespace App\Actions;

use App\Tasks\FindSeoTask;
use Illuminate\Database\Eloquent\Model;

class FindSeoAction
{
    public function __construct(
        protected FindSeoTask $findSeoTask
    )
    {
    }

    public function run(int $id): Model
    {
        return $this->findSeoTask->run($id);
    }
}
