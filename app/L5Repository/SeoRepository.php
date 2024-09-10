<?php

namespace App\L5Repository;

use App\Models\Seo;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

class SeoRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'url' => 'like',
    ];

    public function boot(){
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function model(): string
    {
        return Seo::class;
    }
}
