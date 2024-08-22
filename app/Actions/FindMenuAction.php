<?php

namespace App\Actions;

use App\Tasks\FindMenuTask;
use Illuminate\Database\Eloquent\Model;

class FindMenuAction
{
    public function __construct(
        protected FindMenuTask $findMenuTask
    )
    {
    }

    public function run(int $id): Model|null
    {
        return $this->findMenuTask->run($id);
    }
}
