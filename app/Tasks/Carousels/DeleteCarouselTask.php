<?php

namespace App\Tasks\Carousels;

use App\L5Repository\CarouselRepository;

class DeleteCarouselTask
{
    public function __construct(
        protected CarouselRepository $repository
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->repository->delete($id);
    }
}
