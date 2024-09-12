<?php

namespace App\Actions\Media;

use App\Tasks\Media\CreateMediaTask;
use App\Tasks\Media\PutFileToStorageTask;
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
