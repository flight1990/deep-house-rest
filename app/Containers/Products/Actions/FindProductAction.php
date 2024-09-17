<?php

namespace App\Containers\Products\Actions;

use App\Containers\Products\Tasks\FindProductTask;
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
