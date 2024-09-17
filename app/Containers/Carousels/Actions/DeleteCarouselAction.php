<?php

namespace App\Containers\Carousels\Actions;

use App\Containers\Carousels\Tasks\DeleteCarouselTask;

class DeleteCarouselAction
{
    public function __construct(
        protected DeleteCarouselTask $deleteCarouselTask
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->deleteCarouselTask->run($id);
    }
}
