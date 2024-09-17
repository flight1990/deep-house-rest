<?php

namespace App\Containers\Seo\Actions;

use App\Containers\Seo\Tasks\CreateSeoTask;
use Illuminate\Database\Eloquent\Model;

class CreateSeoAction
{
    public function __construct(
        protected CreateSeoTask $createSeoTask
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->createSeoTask->run($payload);
    }
}
