<?php

namespace App\Actions\Media;

use App\Tasks\Media\GetMediaTask;
use Illuminate\Pagination\LengthAwarePaginator;

class GetMediaAction
{
    public function __construct(
        protected GetMediaTask $getMediaTask
    )
    {
    }

    public function run(array $params = []): LengthAwarePaginator
    {
        return $this->getMediaTask
            ->byInId($params['in'] ?? [])
            ->run($params['limit'] ?? 15);
    }
}
