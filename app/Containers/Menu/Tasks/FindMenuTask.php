<?php

namespace App\Containers\Menu\Tasks;

use App\Containers\Menu\Repository\MenuRepository;
use Illuminate\Database\Eloquent\Model;

class FindMenuTask
{
    public function __construct(
        protected MenuRepository $repository
    )
    {
    }

    public function run(int $id): Model
    {
        return $this->repository->findOrFail($id);
    }
}
