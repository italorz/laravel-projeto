<?php

namespace App\Repositories\contracts;

use App\Models\Automovel;
use Illuminate\Pagination\LengthAwarePaginator;

interface AutomovelRepositoryInterface
{
    public function paginateWithSearch(?string $string): LengthAwarePaginator;
    public function find(int $id): Automovel;
    public function create(array $data): Automovel;
    public function update(int $id, array $data): Automovel;
    public function delete(int $id): bool;
}
