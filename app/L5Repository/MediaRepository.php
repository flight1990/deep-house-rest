<?php

namespace App\L5Repository;

use App\Models\Media;
use Prettus\Repository\Eloquent\BaseRepository;

class MediaRepository extends BaseRepository
{
    public function model(): string
    {
        return Media::class;
    }
}
