<?php

namespace App\Containers\Seo\Tasks;

use App\Containers\Seo\Repository\SeoRepository;
use Illuminate\Database\Eloquent\Model;

class UpdateSeoTask
{
    public function __construct(
        protected SeoRepository $repository
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->repository->update($payload, $id);
    }
}
