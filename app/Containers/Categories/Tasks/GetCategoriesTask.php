<?php

namespace App\Containers\Categories\Tasks;

use App\Containers\Categories\Repository\CategoryRepository;
use App\Criteria\WhereNotInCriteria;
use Illuminate\Database\Eloquent\Collection;

class GetCategoriesTask
{
    public function __construct(
        protected CategoryRepository $repository
    )
    {
    }

    public function run(): Collection
    {
        return $this->repository->all();
    }

    public function byNotInId(?array $data = []): self
    {
        $this->repository->pushCriteria(new WhereNotInCriteria('id', $data));
        return $this;
    }
}
