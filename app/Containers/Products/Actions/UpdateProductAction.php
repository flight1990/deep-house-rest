<?php

namespace App\Containers\Products\Actions;

use App\Containers\Products\Tasks\UpdateProductTask;
use Illuminate\Database\Eloquent\Model;

class UpdateProductAction
{
    public function __construct(
        protected UpdateProductTask $updateProductTask,
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->updateProductTask->run($payload, $id);
    }
}
