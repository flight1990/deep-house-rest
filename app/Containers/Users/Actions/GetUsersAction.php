<?php

namespace App\Containers\Users\Actions;

use App\Containers\Users\Tasks\GetUsersTask;
use Illuminate\Pagination\LengthAwarePaginator;

class GetUsersAction
{
    public function __construct(
        protected GetUsersTask $getUsersTask
    )
    {
    }

    public function run(array $params = []): LengthAwarePaginator
    {
        return $this->getUsersTask->run($params['limit'] ?? 15);
    }
}
