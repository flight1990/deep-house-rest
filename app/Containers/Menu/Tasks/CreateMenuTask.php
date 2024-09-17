<?php

namespace App\Containers\Menu\Tasks;

use App\Containers\Menu\Repository\MenuRepository;
use Illuminate\Database\Eloquent\Model;

class CreateMenuTask
{
    public function __construct(
        protected MenuRepository $repository
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->repository->create($payload);
    }
}
