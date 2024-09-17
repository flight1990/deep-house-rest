<?php

namespace App\Containers\Pages\Tasks;

use App\Containers\Pages\Repository\PageRepository;
use Illuminate\Database\Eloquent\Model;

class CreatePageTask
{
    public function __construct(
        protected PageRepository $repository
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->repository->create($payload);
    }
}
