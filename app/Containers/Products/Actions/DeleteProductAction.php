<?php

namespace App\Containers\Products\Actions;

use App\Containers\Products\Tasks\DeleteProductTask;

class DeleteProductAction
{
    public function __construct(
        protected DeleteProductTask $deleteProductTask
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->deleteProductTask->run($id);
    }
}
