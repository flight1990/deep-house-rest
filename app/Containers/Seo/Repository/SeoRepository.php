<?php

namespace App\Containers\Seo\Repository;

use App\Containers\Seo\Models\Seo;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

class SeoRepository extends BaseRepository
{
    protected $fieldSearchable = [

    ];

    public function boot(){
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function model(): string
    {
        return Seo::class;
    }
}
