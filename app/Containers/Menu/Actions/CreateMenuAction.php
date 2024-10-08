<?php

namespace App\Containers\Menu\Actions;

use App\Containers\Menu\Tasks\CreateMenuTask;
use Illuminate\Database\Eloquent\Model;

class CreateMenuAction
{
    public function __construct(
        protected CreateMenuTask $createMenuTask
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->createMenuTask->run($payload);
    }
}
