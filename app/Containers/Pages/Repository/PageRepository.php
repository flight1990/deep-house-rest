<?php

namespace App\Containers\Pages\Repository;

use App\Containers\Pages\Models\Page;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

class PageRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name' => 'like',
    ];

    public function boot(){
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function model(): string
    {
        return Page::class;
    }
}
