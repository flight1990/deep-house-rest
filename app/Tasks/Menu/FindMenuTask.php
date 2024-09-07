<?php

namespace App\Tasks\Menu;

use App\Repositories\Contracts\MenuRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class FindMenuTask
{
    public function __construct(
        protected MenuRepositoryInterface $repository
    )
    {
    }

    public function run(int $id): Model
    {
        return $this->repository->findById($id);
    }
}
