<?php

namespace App\Tasks\Menu;

use App\Repositories\Contracts\MenuRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CreateMenuTask
{
    public function __construct(
        protected MenuRepositoryInterface $repository
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->repository->create($payload);
    }
}
