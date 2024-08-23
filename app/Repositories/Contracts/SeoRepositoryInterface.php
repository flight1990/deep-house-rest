<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface SeoRepositoryInterface extends BaseRepositoryInterface
{
    public function findByUrl(string $url): Model;
}
