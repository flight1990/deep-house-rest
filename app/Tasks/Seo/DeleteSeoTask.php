<?php

namespace App\Tasks\Seo;

use App\L5Repository\SeoRepository;

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
