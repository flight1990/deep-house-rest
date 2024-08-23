<?php

namespace App\Actions\Pages;

use App\Tasks\Pages\FindPageTask;
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
