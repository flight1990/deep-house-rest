<?php

namespace App\Actions\Menu;

use App\Tasks\Menu\UpdateMenuTask;
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
