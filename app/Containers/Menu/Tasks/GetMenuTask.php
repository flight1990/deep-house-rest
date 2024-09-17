<?php

namespace App\Containers\Menu\Tasks;

use App\Containers\Menu\Repository\MenuRepository;
use App\Criteria\WhereNotInCriteria;
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

    public function byNotInId(?array $data = []): self
    {
        $this->repository->pushCriteria(new WhereNotInCriteria('id', $data));
        return $this;
    }
}
