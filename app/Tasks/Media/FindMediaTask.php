<?php

namespace App\Tasks\Media;

use App\L5Repository\MediaRepository;
use Illuminate\Database\Eloquent\Model;

class FindMediaTask
{
    public function __construct(
        protected MediaRepository $repository
    )
    {
    }

    public function run(int $id): Model|null
    {
        return $this->repository->findOrFail($id);
    }
}
