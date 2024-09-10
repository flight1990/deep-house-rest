<?php

namespace App\L5Repository;

use App\Models\User;
use Prettus\Repository\Criteria\RequestCriteria;
use Prettus\Repository\Eloquent\BaseRepository;

class UserRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name' => 'like',
        'email' => 'like'
    ];

    public function boot(){
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function model(): string
    {
        return User::class;
    }
}
