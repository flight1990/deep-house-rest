<?php

namespace App\Tasks\Menu;

use App\L5Repository\MenuRepository;
use App\Criteria\WhereNotInCriteriaCriteria;
use Illuminate\Database\Eloquent\Collection;

class GetMenuTask
{
    public function __construct(
        protected MenuRepository $repository
    )
    {
    }

    public function run(): Collection
    {
        return $this->repository->all();
    }

    public function byExceptId(?array $data = []): self
    {
        $this->repository->pushCriteria(new WhereNotInCriteriaCriteria('id', $data));
        return $this;
    }
}
