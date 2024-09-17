<?php

namespace App\Containers\Carousels\Actions;

use App\Containers\Carousels\Tasks\UpdateCarouselTask;
use Illuminate\Database\Eloquent\Model;

class UpdateCarouselAction
{
    public function __construct(
        protected UpdateCarouselTask $updateCarouselTask,
    )
    {
    }

    public function run(array $payload, int $id): Model
    {
        return $this->updateCarouselTask->run($payload, $id);
    }
}
