<?php

namespace App\Actions\Products;

use App\Tasks\Products\CreateProductTask;
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
