<?php

namespace App\Actions\Products;

use App\Tasks\Products\FindProductTask;
use Illuminate\Database\Eloquent\Model;

class FindProductAction
{
    public function __construct(
        protected FindProductTask $findProductTask
    )
    {
    }

    public function run(int|string $identifier): Model|null
    {
        return $this->findProductTask->run($identifier);
    }
}
