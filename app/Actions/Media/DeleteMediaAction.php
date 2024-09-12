<?php

namespace App\Actions\Media;

use App\Tasks\Media\DeleteMediaTask;

class DeleteMediaAction
{
    public function __construct(
        protected DeleteMediaTask $deleteMediaTask
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->deleteMediaTask->run($id);
    }
}
