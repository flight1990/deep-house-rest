<?php

namespace App\Tasks;

use App\Repositories\Contracts\MenuRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UpdateMenuTask
{
    public function __construct(
        protected MenuRepositoryInterface $menuRepository
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->menuRepository->update($payload, $id);
    }
}
