<?php

namespace App\Containers\Carousels\Tasks;

use App\Containers\Carousels\Repository\CarouselRepository;
use Illuminate\Database\Eloquent\Collection;

class GetCarouselsTask
{
    public function __construct(
        protected CarouselRepository $repository
    )
    {
    }

    public function run(): Collection
    {
        return $this->repository
            ->with(['photo'])
            ->get();
    }
}
