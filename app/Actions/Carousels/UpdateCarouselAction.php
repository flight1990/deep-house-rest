<?php

namespace App\Actions\Carousels;

use App\Tasks\Carousels\UpdateCarouselTask;
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
