<?php

namespace App\Repositories;

use App\Models\Menu;

class MenuRepository extends BaseRepository implements Contracts\MenuRepositoryInterface
{
    public function __construct(Menu $model)
    {
        parent::__construct($model);
    }
}
