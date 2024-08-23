<?php

namespace App\Actions\Seo;

use App\Tasks\Seo\FindSeoTask;
use Illuminate\Database\Eloquent\Model;

class FindSeoAction
{
    public function __construct(
        protected FindSeoTask $findSeoTask
    )
    {
    }

    public function run(int $id): Model
    {
        return $this->findSeoTask->run($id);
    }
}
