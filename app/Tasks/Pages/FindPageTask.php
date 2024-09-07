<?php

namespace App\Tasks\Pages;

use App\Repositories\Contracts\PageRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class FindPageTask
{
    public function __construct(
        protected PageRepositoryInterface $repository
    )
    {
    }

    public function run(int|string $identifier): Model|null
    {
        if (is_numeric($identifier)) {
            return $this->repository->findById($identifier);
        }

        return $this->repository->findBySlug($identifier);
    }
}
