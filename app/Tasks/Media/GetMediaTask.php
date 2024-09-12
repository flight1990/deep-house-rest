<?php

namespace App\Tasks\Media;

use App\Criteria\WhereInCriteria;
use App\L5Repository\MediaRepository;
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
