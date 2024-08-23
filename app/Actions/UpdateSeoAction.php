<?php

namespace App\Actions;

use App\Tasks\UpdateSeoTask;
use Illuminate\Database\Eloquent\Model;

class UpdateSeoAction
{
    public function __construct(
        protected UpdateSeoTask $updateSeoTask,
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->updateSeoTask->run($payload, $id);
    }
}
