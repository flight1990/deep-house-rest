<?php

namespace App\Tasks\Seo;

use App\Repositories\Contracts\SeoRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UpdateSeoTask
{
    public function __construct(
        protected SeoRepositoryInterface $repository
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->repository->update($payload, $id);
    }
}
