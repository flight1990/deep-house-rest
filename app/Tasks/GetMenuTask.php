<?php

namespace App\Tasks;

use App\Repositories\Contracts\MenuRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GetMenuTask
{
    public function __construct(
        protected MenuRepositoryInterface $menuRepository
    )
    {
    }

    public function run(): Collection
    {
        return $this->menuRepository->all();
    }
}
