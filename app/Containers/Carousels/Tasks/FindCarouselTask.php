<?php

namespace App\Containers\Carousels\Tasks;

use App\Containers\Carousels\Repository\CarouselRepository;
use Illuminate\Database\Eloquent\Model;

class FindCarouselTask
{
    public function __construct(
        protected CarouselRepository $repository
    )
    {
    }

    public function run(int $id): Model|null
    {
        return $this->repository
            ->with(['photo'])
            ->find($id);
    }
}
