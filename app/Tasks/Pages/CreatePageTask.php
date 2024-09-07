<?php

namespace App\Tasks\Pages;

use App\Repositories\Contracts\PageRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CreatePageTask
{
    public function __construct(
        protected PageRepositoryInterface $repository
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->repository->create($payload);
    }
}
