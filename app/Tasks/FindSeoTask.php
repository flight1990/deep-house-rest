<?php

namespace App\Tasks;

use App\Repositories\Contracts\SeoRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class FindSeoTask
{
    public function __construct(
        protected SeoRepositoryInterface $seoRepository
    )
    {
    }

    public function run(int|string $identifier): Model|null
    {
        if (is_numeric($identifier)) {
            return $this->seoRepository->findByUrl($identifier);
        }

        return $this->seoRepository->findById($identifier);
    }
}
