<?php

namespace App\Actions\Reviews;

use App\Tasks\Reviews\GetReviewsTask;
use Illuminate\Pagination\LengthAwarePaginator;

class GetReviewsAction
{
    public function __construct(
        protected GetReviewsTask $getReviewsTask
    )
    {
    }

    public function run(array $params = []): LengthAwarePaginator
    {
        return $this->getReviewsTask->run($params['limit'] ?? 15);
    }
}
