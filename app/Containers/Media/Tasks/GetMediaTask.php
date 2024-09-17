<?php

namespace App\Containers\Media\Tasks;

use App\Containers\Media\Repository\MediaRepository;
use App\Criteria\WhereInCriteria;
use Illuminate\Pagination\LengthAwarePaginator;

class GetMediaTask
{
    public function __construct(
        protected MediaRepository $repository
    )
    {
    }

    public function run(int $limit = 15): LengthAwarePaginator
    {
        return $this->repository->paginate($limit);
    }

    public function byInId(?array $data = []): self
    {
        $this->repository->pushCriteria(new WhereInCriteria('id', $data));
        return $this;
    }
}
