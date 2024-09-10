<?php

namespace App\Tasks\Menu;

use App\L5Repository\MenuRepository;
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
        return $this->repository->find($id);
    }
}
