<?php

namespace App\Containers\Seo\Actions;

use App\Containers\Seo\Tasks\FindSeoTask;
use Illuminate\Database\Eloquent\Model;

class FindSeoAction
{
    public function __construct(
        protected FindSeoTask $findSeoTask
    )
    {
    }

    public function run(int|string $identifier): Model|null
    {
        return $this->findSeoTask->run($identifier);
    }
}
