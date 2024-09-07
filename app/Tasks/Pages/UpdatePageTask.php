<?php

namespace App\Tasks\Pages;

use App\Repositories\Contracts\PageRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UpdatePageTask
{
    public function __construct(
        protected PageRepositoryInterface $repository
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->repository->update($payload, $id);
    }
}
