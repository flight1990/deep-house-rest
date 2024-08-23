<?php

namespace App\Actions\Seo;

use App\Tasks\Seo\CreateSeoTask;
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
