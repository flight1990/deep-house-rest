<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class WhereInCriteria implements CriteriaInterface
{
    protected ?string $filed;
    protected ?array $data = [];

    public function __construct(string $field, array $data = [])
    {
        $this->filed = $field;
        $this->data = $data;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (!is_null($this->filed) && !empty($this->data)) {
            $model = $model->whereIn($this->filed, $this->data);
        }

        return $model;
    }
}
