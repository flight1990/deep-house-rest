<?php

namespace App\Containers\Faqs\Actions;

use App\Containers\Faqs\Tasks\UpdateFaqTask;
use Illuminate\Database\Eloquent\Model;

class UpdateFaqAction
{
    public function __construct(
        protected UpdateFaqTask $updateFaqTask,
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->updateFaqTask->run($payload, $id);
    }
}
