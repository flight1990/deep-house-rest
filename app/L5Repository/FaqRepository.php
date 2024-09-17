<?php

namespace App\L5Repository;

use App\Models\Faq;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

class FaqRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'question' => 'like',
    ];

    public function boot(){
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function model(): string
    {
        return Faq::class;
    }
}
