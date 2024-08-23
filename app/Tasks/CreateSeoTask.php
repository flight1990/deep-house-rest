<?php

namespace App\Tasks;

use App\Repositories\Contracts\SeoRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CreateSeoTask
{
    public function __construct(
        protected SeoRepositoryInterface $seoRepository
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->seoRepository->create($payload);
    }
}
