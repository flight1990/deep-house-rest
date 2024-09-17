<?php

namespace App\Containers\Media\Actions;

use App\Containers\Media\Tasks\CreateMediaTask;
use App\Containers\Media\Tasks\PutFileToStorageTask;
use Illuminate\Database\Eloquent\Model;

class CreateMediaAction
{
    public function __construct(
        protected CreateMediaTask      $createMediaTask,
        protected PutFileToStorageTask $putFileToStorageTask
    )
    {
    }

    public function run(array $payload): Model
    {
        $payload['path'] = $this->putFileToStorageTask->run($payload['file'])['file_path'];
        return $this->createMediaTask->run($payload);
    }
}
