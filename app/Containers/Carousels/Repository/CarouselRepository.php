<?php

namespace App\Containers\Carousels\Repository;

use App\Containers\Carousels\Models\Carousel;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

class CarouselRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name' => 'like',
    ];

    public function boot(){
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function model(): string
    {
        return Carousel::class;
    }
}
