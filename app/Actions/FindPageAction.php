<?php

namespace App\Actions;

use App\Tasks\FindPageTask;
use Illuminate\Database\Eloquent\Model;

class FindPageAction
{
    public function __construct(
        protected FindPageTask $findPageTask
    )
    {
    }

    public function run(int|string $identifier): Model|null
    {
        return $this->findPageTask->run($identifier);
    }
}
