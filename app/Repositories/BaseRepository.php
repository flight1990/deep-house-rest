<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseRepository implements Contracts\BaseRepositoryInterface
{
    public function __construct(
        protected Model $model
    )
    {
    }

    public function paginate(int $limit = 15): LengthAwarePaginator
    {
        return $this->model->paginate();
    }

    public function all(): Collection
    {
        return $this->model->all();
    }

    public function findById(int $id): Model|null
    {
        return $this->model->findOrFail($id);
    }

    public function findBySlug(string $slug): Model|null
    {
        return $this->model->where('slug', $slug)->firstOrFail();
    }

    public function create(array $payload): Model
    {
        return $this->model->create($payload);
    }

    public function update(array $payload, int $id): Model
    {
        $model = $this->findById($id);
        $model->update($payload);

        return $model;
    }

    public function delete(int $id): bool
    {
        $model = $this->findById($id);
        return $model->delete();
    }
}
