<?php

namespace App\Containers\Categories\Repository;

use App\Containers\Categories\Models\Category;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

class CategoryRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name' => 'like',
    ];

    public function boot(){
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function model(): string
    {
        return Category::class;
    }
}
