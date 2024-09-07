<?php

namespace App\Tasks\Seo;

use App\Repositories\Contracts\SeoRepositoryInterface;

class DeleteSeoTask
{
    public function __construct(
        protected SeoRepositoryInterface $repository
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
