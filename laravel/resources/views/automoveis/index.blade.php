@extends('layouts.app')

@section('title', 'Listagem de Automóveis')

@section('content')
    <div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
        <h1 class="h3 m-0">Automóveis</h1>
        <a href="{{ route('automovel.create') }}" class="btn btn-primary">Novo automóvel</a>
    </div>

    <div class="card mb-3">
        <div class="card-body">
            <form action="{{ route('automovel.index') }}" method="get" class="row g-2 align-items-center">
                <div class="col-12 col-md-5">
                    <select class="form-select" name="montadora_id" aria-label="Filtrar por montadora">
                        <option value="">Todas as montadoras</option>
                        @foreach ($montadoras ?? collect() as $item)
                            <option value="{{ $item->id }}" @selected((string) $item->id === (string) request('montadora_id'))>
                                {{ $item->nome }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="col-12 col-md-2 d-grid">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-striped align-middle mb-0">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Placa</th>
                        <th>Chassi</th>
                        <th>Montadora</th>
                        <th class="text-end">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($automoveis as $a)
                        <tr>
                            <td>{{ $a->nome }}</td>
                            <td>{{ $a->placa }}</td>
                            <td>{{ $a->chassi }}</td>
                            <td>{{ $a->montadora->nome ?? '-' }}</td>
                            <td class="text-end text-nowrap">
                                <a class="btn btn-sm btn-outline-secondary" href="{{ route('automovel.show', $a) }}">Ver</a>
                                <a class="btn btn-sm btn-outline-primary"
                                    href="{{ route('automovel.edit', $a) }}">Editar</a>
                                <form class="d-inline" action="{{ route('automovel.destroy', $a) }}" method="post"
                                    onsubmit="return confirm('Excluir este automóvel?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger">Excluir</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-body-secondary py-4">
                                Nenhum automóvel encontrado.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    @if ($automoveis->hasPages())
        <div class="mt-3">
            {{ $automoveis->withQueryString()->links('pagination.simple') }}
        </div>
    @endif
@endsection
