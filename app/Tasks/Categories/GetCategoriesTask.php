<?php

namespace App\Tasks\Categories;

use App\Criteria\WhereNotInCriteria;
use App\L5Repository\CategoryRepository;
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

    public function byExceptId(?array $data = []): self
    {
        $this->repository->pushCriteria(new WhereNotInCriteria('id', $data));
        return $this;
    }
}
