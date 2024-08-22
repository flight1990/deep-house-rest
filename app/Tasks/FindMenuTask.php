<?php

namespace App\Tasks;

use App\Repositories\Contracts\MenuRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class FindMenuTask
{
    public function __construct(
        protected MenuRepositoryInterface $menuRepository
    )
    {
    }

    public function run(int $id): Model|null
    {
        return $this->menuRepository->findById($id);
    }
}
