<?php

namespace App\Containers\Carousels\Actions;

use App\Containers\Carousels\Tasks\GetCarouselsTask;
use Illuminate\Database\Eloquent\Collection;

class GetCarouselsAction
{
    public function __construct(
        protected GetCarouselsTask $getCarouselsTask
    )
    {
    }

    public function run(?array $params = []): Collection
    {
        return $this->getCarouselsTask->run();
    }
}
