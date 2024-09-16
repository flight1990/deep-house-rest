<?php

namespace App\Tasks\Carousels;

use App\L5Repository\CarouselRepository;
use Illuminate\Database\Eloquent\Model;

class UpdateCarouselTask
{
    public function __construct(
        protected CarouselRepository $repository
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->repository->update($payload, $id);
    }
}
