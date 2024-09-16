<?php

namespace App\Actions\Carousels;

use App\Tasks\Carousels\GetCarouselsTask;
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
