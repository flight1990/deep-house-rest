<?php

namespace App\Actions\Carousels;

use App\Tasks\Carousels\DeleteCarouselTask;

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
