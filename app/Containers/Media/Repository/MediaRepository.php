<?php

namespace App\Containers\Media\Repository;

use App\Containers\Media\Models\Media;
use Prettus\Repository\Eloquent\BaseRepository;

class MediaRepository extends BaseRepository
{
    public function model(): string
    {
        return Media::class;
    }
}
