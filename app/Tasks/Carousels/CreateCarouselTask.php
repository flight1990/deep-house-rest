<?php

namespace App\Tasks\Carousels;

use App\L5Repository\CarouselRepository;
use Illuminate\Database\Eloquent\Model;

class CreateCarouselTask
{
    public function __construct(
        protected CarouselRepository $repository
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->repository->create($payload);
    }
}
