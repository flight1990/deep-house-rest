<?php

namespace App\Repositories;

use App\Models\Page;

class PageRepository extends BaseRepository implements Contracts\PageRepositoryInterface
{
    public function __construct(Page $model)
    {
        parent::__construct($model);
    }
}
