<?php

namespace App\Containers\Faqs\Repository;

use App\Containers\Faqs\Models\Faq;
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
