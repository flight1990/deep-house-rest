<?php

namespace App\Tasks;

use App\Repositories\Contracts\MenuRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CreateMenuTask
{
    public function __construct(
        protected MenuRepositoryInterface $menuRepository
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->menuRepository->create($payload);
    }
}
