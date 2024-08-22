<?php

namespace App\Actions;

use App\Tasks\GetPagesTask;
use Illuminate\Pagination\LengthAwarePaginator;

class GetPagesAction
{
    public function __construct(
        protected GetPagesTask $getPagesTask
    )
    {
    }

    public function run(array $params = []): LengthAwarePaginator
    {
        return $this->getPagesTask->run($params['limit'] ?? 15);
    }
}
