<?php

namespace App\Actions\Products;

use App\Tasks\Products\DeleteProductTask;

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
