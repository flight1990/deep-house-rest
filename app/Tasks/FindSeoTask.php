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

    public function run(int $id): Model
    {
        return $this->seoRepository->findById($id);
    }
}
