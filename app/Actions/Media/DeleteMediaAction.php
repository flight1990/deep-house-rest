<?php

namespace App\Actions\Media;

use App\Tasks\Media\DeleteFileFromStorageTask;
use App\Tasks\Media\DeleteMediaTask;
use App\Tasks\Media\FindMediaTask;

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
