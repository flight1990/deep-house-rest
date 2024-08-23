<?php

namespace App\Tasks;

use App\Repositories\Contracts\SeoRepositoryInterface;

class DeleteSeoTask
{
    public function __construct(
        protected SeoRepositoryInterface $seoRepository
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->seoRepository->delete($id);
    }
}
