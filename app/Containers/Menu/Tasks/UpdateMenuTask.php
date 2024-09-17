<?php

namespace App\Containers\Menu\Tasks;

use App\Containers\Menu\Repository\MenuRepository;
use Illuminate\Database\Eloquent\Model;

class UpdateMenuTask
{
    public function __construct(
        protected MenuRepository $repository
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->repository->update($payload, $id);
    }
}
