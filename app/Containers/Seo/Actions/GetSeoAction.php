<?php

namespace App\Containers\Seo\Actions;

use App\Containers\Seo\Tasks\GetSeoTask;
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
