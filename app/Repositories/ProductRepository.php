<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Pagination\LengthAwarePaginator;

class ProductRepository extends BaseRepository implements Contracts\ProductRepositoryInterface
{
    public function __construct(Product $model)
    {
        parent::__construct($model);
    }

    public function paginate(int $limit = 15): LengthAwarePaginator
    {
        return $this->model->with(['category'])->paginate($limit);
    }
}
