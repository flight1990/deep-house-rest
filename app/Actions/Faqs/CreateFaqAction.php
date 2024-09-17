<?php

namespace App\Actions\Faqs;

use App\Tasks\Faqs\CreateFaqTask;
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
