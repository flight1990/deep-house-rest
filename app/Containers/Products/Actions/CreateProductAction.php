<?php

namespace App\Containers\Products\Actions;

use App\Containers\Products\Tasks\CreateProductTask;
use Illuminate\Database\Eloquent\Model;

class CreateProductAction
{
    public function __construct(
        protected CreateProductTask $createProductTask
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->createProductTask->run($payload);
    }
}
