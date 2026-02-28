<?php

namespace App\Repositories;

use App\Models\Automovel;
use App\Repositories\contracts\AutomovelRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class AutomovelRepository implements AutomovelRepositoryInterface
{
    public function paginateWithSearch(?string $string): LengthAwarePaginator
    {
        return Automovel::query()
            ->with('montadora')
            ->when($string, function ($query, $string) {
                $query->where('nome', 'like', "%$string%");
            })
            ->paginate(10);
    }

    public function find(int $id): Automovel
    {
        return Automovel::findOrFail($id);
    }

    public function create(array $data): Automovel
    {
        return Automovel::create($data);
    }

    public function update(int $id, array $data): Automovel
    {
        $automovel = Automovel::findOrFail($id);
        $automovel->update($data);
        return $automovel->fresh();
    }

    public function delete(int $id): bool
    {
        return Automovel::findOrFail($id)->delete();
    }
}
