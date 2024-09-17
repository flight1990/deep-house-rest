<?php

namespace App\Containers\Pages\Tasks;

use App\Containers\Pages\Repository\PageRepository;
use App\Criteria\WhereFieldCriteria;
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
