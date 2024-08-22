<?php

namespace App\Tasks;

use App\Repositories\Contracts\PageRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class CreatePageTask
{
    public function __construct(
        protected PageRepositoryInterface $pageRepository
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->pageRepository->create($payload);
    }
}
