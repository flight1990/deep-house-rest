<?php

namespace App\Actions\Carousels;

use App\Tasks\Carousels\CreateCarouselTask;
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
