<?php

namespace App\Containers\Faqs\Actions;

use App\Containers\Faqs\Tasks\CreateFaqTask;
use Illuminate\Database\Eloquent\Model;

class CreateFaqAction
{
    public function __construct(
        protected CreateFaqTask $createFaqTask
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->createFaqTask->run($payload);
    }
}
