<?php

namespace App\Repositories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Collection;

class CategoryRepository extends BaseRepository implements Contracts\CategoryRepositoryInterface
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
    }

    public function all(int $id = null): Collection
    {
        return $this->model
            ->when(!empty($id), function ($q) use ($id) {
                $q->where('id', '!=', $id)
                    ->whereNotDescendantOf($id);
            })
            ->get();
    }
}
