<?php

namespace App\Repositories;

use App\Models\Automovel;
use App\Repositories\contracts\AutomovelRepositoryInterface;
use Illuminate\Pagination\LengthAwarePaginator;

class AutomovelRepository implements AutomovelRepositoryInterface
{
    function __construct(private Automovel $automovel) {}
    public function paginateWithMontadora(?int $montadoraId = null): LengthAwarePaginator
    {
        return $this->automovel->query()
            ->with('montadora')
            ->when($montadoraId, function ($query, $montadoraId) {
                $query->where('montadora_id', $montadoraId);
            })
            ->paginate(10);
    }

    public function find(int $id): Automovel
    {
        return $this->automovel->findOrFail($id);
    }

    public function create(array $data): Automovel
    {
        return $this->automovel->create($data);
    }

    public function update(int $id, array $data): Automovel
    {
        $automovel = $this->automovel->findOrFail($id);
        $automovel->update($data);
        return $automovel->fresh();
    }

    public function delete(int $id): bool
    {
        return $this->automovel->find($id)->delete();
    }
}
