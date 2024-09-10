<?php

namespace App\L5Repository;

use App\Models\Review;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

class ReviewRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'title' => 'like',
        'name' => 'like',
        'email' => 'like',
        'phone' => 'like'
    ];

    public function boot(){
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function model(): string
    {
        return Review::class;
    }
}
