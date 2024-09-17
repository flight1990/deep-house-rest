<?php

namespace App\Tasks\Pages;

use App\Criteria\WhereFieldCriteria;
use App\L5Repository\PageRepository;
use Illuminate\Database\Eloquent\Model;

class FindPageTask
{
    public function __construct(
        protected PageRepository $repository
    )
    {
    }

    public function run(int|string $identifier): Model|null
    {
        if (is_numeric($identifier)) {
            return $this->repository->findOrFail($identifier);
        }

        return $this->repository
            ->pushCriteria(new WhereFieldCriteria('slug', $identifier))
            ->firstOrFail();
    }
}
