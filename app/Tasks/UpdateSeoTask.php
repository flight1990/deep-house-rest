<?php

namespace App\Tasks;

use App\Repositories\Contracts\SeoRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class UpdateSeoTask
{
    public function __construct(
        protected SeoRepositoryInterface $seoRepository
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->seoRepository->update($payload, $id);
    }
}
