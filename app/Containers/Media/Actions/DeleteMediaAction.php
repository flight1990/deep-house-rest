<?php

namespace App\Containers\Media\Actions;

use App\Containers\Media\Tasks\DeleteFileFromStorageTask;
use App\Containers\Media\Tasks\DeleteMediaTask;
use App\Containers\Media\Tasks\FindMediaTask;

class DeleteMediaAction
{
    public function __construct(
        protected FindMediaTask   $findMediaTask,
        protected DeleteMediaTask $deleteMediaTask,
        protected DeleteFileFromStorageTask $deleteFileFromStorageTask
    )
    {
    }

    public function run(int $id): bool
    {
        $this->deleteFileFromStorageTask->run($this->findMediaTask->run($id)['path']);
        return $this->deleteMediaTask->run($id);
    }
}
