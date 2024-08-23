<?php

namespace App\Actions\Seo;

use App\Tasks\Seo\FindSeoTask;
use Illuminate\Database\Eloquent\Model;

class FindSeoByUrlAction
{
    public function __construct(
        protected FindSeoTask $findSeoTask
    )
    {
    }

    public function run(string $url): Model
    {
        return $this->findSeoTask->run($url);
    }
}
