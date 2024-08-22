<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface BaseRepositoryInterface
{
    public function paginate(int $limit = 15): LengthAwarePaginator;

    public function all(): Collection;

    public function findById(int $id): Model|null;

    public function findBySlug(string $slug): Model|null;

    public function create(array $payload): Model|null;

    public function update(array $payload, int $id): Model|null;

    public function delete(int $id): bool;
}
