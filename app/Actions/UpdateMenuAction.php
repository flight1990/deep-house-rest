<?php

namespace App\Actions;

use App\Tasks\UpdateMenuTask;
use Illuminate\Database\Eloquent\Model;

class UpdateMenuAction
{
    public function __construct(
        protected UpdateMenuTask $updateMenuTask,
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->updateMenuTask->run($payload, $id);
    }
}
