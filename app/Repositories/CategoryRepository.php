<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository extends BaseRepository implements Contracts\CategoryRepositoryInterface
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }
}
