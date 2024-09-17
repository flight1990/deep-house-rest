<?php

namespace App\Containers\Seo\Tasks;

use App\Containers\Seo\Repository\SeoRepository;
use Illuminate\Database\Eloquent\Model;

class CreateSeoTask
{
    public function __construct(
        protected SeoRepository $repository
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->repository->create($payload);
    }
}
