<?php

namespace App\Actions;

use App\Tasks\CreatePageTask;
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
