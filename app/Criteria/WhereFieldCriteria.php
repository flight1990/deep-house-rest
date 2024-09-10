<?php

namespace App\Criteria;

use Prettus\Repository\Contracts\CriteriaInterface;
use Prettus\Repository\Contracts\RepositoryInterface;

class WhereFieldCriteria implements CriteriaInterface
{
    protected ?string $filed;
    protected ?string $value;

    public function __construct(?string $field, ?string $value)
    {
        $this->filed = $field;
        $this->value = $value;
    }

    public function apply($model, RepositoryInterface $repository)
    {
        if (!is_null($this->filed) && !is_null($this->value)) {
            $model = $model->where($this->filed, $this->value);
        }

        return $model;
    }
}
