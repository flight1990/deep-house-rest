<?php

namespace App\Containers\Carousels\Tasks;

use App\Containers\Carousels\Repository\CarouselRepository;

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
