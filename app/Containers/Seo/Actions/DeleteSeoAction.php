<?php

namespace App\Containers\Seo\Actions;

use App\Containers\Seo\Tasks\DeleteSeoTask;

class DeleteSeoAction
{
    public function __construct(
        protected DeleteSeoTask $deleteSeoTask
    )
    {
    }

    public function run(int $id): bool
    {
        return $this->deleteSeoTask->run($id);
    }
}
