<?php

namespace App\Containers\Carousels\Actions;

use App\Containers\Carousels\Tasks\CreateCarouselTask;
use Illuminate\Database\Eloquent\Model;

class CreateCarouselAction
{
    public function __construct(
        protected CreateCarouselTask $createCarouselTask
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->createCarouselTask->run($payload);
    }
}
