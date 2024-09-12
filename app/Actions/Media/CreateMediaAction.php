<?php

namespace App\Actions\Media;

use App\Tasks\Media\CreateMediaTask;
use Illuminate\Database\Eloquent\Model;

class CreateMediaAction
{
    public function __construct(
        protected CreateMediaTask $createMediaTask
    )
    {
    }

    public function run(array $payload): Model
    {
        return $this->createMediaTask->run($payload);
    }
}
