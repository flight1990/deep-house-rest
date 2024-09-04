<?php

namespace App\Repositories;

use App\Models\Menu;
use Illuminate\Database\Eloquent\Collection;

class MenuRepository extends BaseRepository implements Contracts\MenuRepositoryInterface
{
    public function __construct(Menu $model)
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
