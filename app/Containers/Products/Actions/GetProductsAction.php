<?php

namespace App\Containers\Products\Actions;

use App\Containers\Products\Tasks\GetProductsTask;
use Illuminate\Pagination\LengthAwarePaginator;

class GetProductsAction
{
    public function __construct(
        protected GetProductsTask $getProductsTask
    )
    {
    }

    public function run(array $params = []): LengthAwarePaginator
    {
        return $this->getProductsTask->run($params['limit'] ?? 15);
    }
}
