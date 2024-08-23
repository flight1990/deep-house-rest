<?php

namespace App\Actions;

use App\Tasks\GetSeoTask;
use Illuminate\Pagination\LengthAwarePaginator;

class GetSeoAction
{
    public function __construct(
        protected GetSeoTask $getSeoTask
    )
    {
    }

    public function run(array $params = []): LengthAwarePaginator
    {
        return $this->getSeoTask->run($params['limit'] ?? 15);
    }
}
