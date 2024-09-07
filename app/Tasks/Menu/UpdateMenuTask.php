<?php

namespace App\Tasks\Menu;

use App\Repositories\Contracts\MenuRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UpdateMenuTask
{
    public function __construct(
        protected MenuRepositoryInterface $repository
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->repository->update($payload, $id);
    }
}
