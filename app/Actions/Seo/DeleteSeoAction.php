<?php

namespace App\Actions\Seo;

use App\Tasks\Seo\DeleteSeoTask;

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
