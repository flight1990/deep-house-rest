<?php

namespace App\Repositories;

use App\Models\Seo;
use Illuminate\Database\Eloquent\Model;

class SeoRepository extends BaseRepository implements Contracts\SeoRepositoryInterface
{
    public function __construct(Seo $model)
    {
        parent::__construct($model);
    }

    public function findByUrl(string $url): Model
    {
        return $this->model->where('url', $url);
    }
}
