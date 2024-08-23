<?php

namespace App\Actions\Menu;

use App\Tasks\Menu\CreateMenuTask;
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
