<?php

namespace App\Containers\Pages\Actions;

use App\Containers\Pages\Tasks\CreatePageTask;
use Illuminate\Database\Eloquent\Model;

class CreatePageAction
{
    public function __construct(
        protected CreatePageTask $createPageTask
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->createPageTask->run($payload);
    }
}
