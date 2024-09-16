<?php

namespace App\Tasks\Carousels;

use App\L5Repository\CarouselRepository;
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
