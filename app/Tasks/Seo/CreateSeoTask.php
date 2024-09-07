<?php

namespace App\Tasks\Seo;

use App\Repositories\Contracts\SeoRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CreateSeoTask
{
    public function __construct(
        protected SeoRepositoryInterface $repository
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->repository->create($payload);
    }
}
