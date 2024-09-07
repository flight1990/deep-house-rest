<?php

namespace App\Tasks\Menu;

use App\Repositories\Contracts\MenuRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GetMenuTask
{
    public function __construct(
        protected MenuRepositoryInterface $repository
    )
    {
    }

    public function run(int $id = null): Collection
    {
        return $this->repository->all($id);
    }
}
