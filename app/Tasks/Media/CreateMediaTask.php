<?php

namespace App\Tasks\Media;

use App\L5Repository\MediaRepository;
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
