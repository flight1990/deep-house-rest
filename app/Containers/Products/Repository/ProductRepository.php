<?php

namespace App\Containers\Products\Repository;

use App\Containers\Products\Models\Product;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

class ProductRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name' => 'like',
    ];

    public function boot(){
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function model(): string
    {
        return Product::class;
    }
}
