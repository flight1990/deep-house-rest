<?php

namespace App\Actions\Pages;

use App\Tasks\Pages\UpdatePageTask;
use Illuminate\Database\Eloquent\Model;

class UpdatePageAction
{
    public function __construct(
        protected UpdatePageTask $updatePageTask,
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->updatePageTask->run($payload, $id);
    }
}
