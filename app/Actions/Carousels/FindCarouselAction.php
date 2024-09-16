<?php

namespace App\Actions\Carousels;

use App\Tasks\Carousels\FindCarouselTask;
use Illuminate\Database\Eloquent\Model;

class FindCarouselAction
{
    public function __construct(
        protected FindCarouselTask $findCarouselTask
    )
    {
    }

    public function run(int|string $identifier): Model|null
    {
        return $this->findCarouselTask->run($identifier);
    }
}
