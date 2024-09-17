<?php

namespace App\Containers\Seo\Tasks;

use App\Containers\Seo\Repository\SeoRepository;

class DeleteSeoTask
{
    public function __construct(
        protected SeoRepository $repository
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
