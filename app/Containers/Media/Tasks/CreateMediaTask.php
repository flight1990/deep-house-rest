<?php

namespace App\Containers\Media\Tasks;

use App\Containers\Media\Repository\MediaRepository;
use Illuminate\Database\Eloquent\Model;

class CreateMediaTask
{
    public function __construct(
        protected MediaRepository $repository
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->repository->create($payload);
    }
}
