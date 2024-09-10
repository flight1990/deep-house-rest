<?php

namespace App\Tasks\Pages;

use App\L5Repository\PageRepository;
use Illuminate\Database\Eloquent\Model;

class UpdatePageTask
{
    public function __construct(
        protected PageRepository $repository
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->repository->update($payload, $id);
    }
}
