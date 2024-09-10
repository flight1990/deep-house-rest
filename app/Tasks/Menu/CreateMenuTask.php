<?php

namespace App\Tasks\Menu;

use App\L5Repository\MenuRepository;
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
