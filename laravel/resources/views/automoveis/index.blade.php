@extends('layouts.app')

@section('title', 'Listagem de Automóveis')

@section('content')
<h1 class="page-title">Automóveis</h1>

<div class="toolbar">
    <form action="{{ route('automovel.index') }}" method="get" class="search-form">
        <input type="search" name="search" value="{{ request('search') }}" placeholder="Buscar por nome..." aria-label="Buscar por nome">
        <button type="submit" class="btn btn-primary">Buscar</button>
    </form>
    <a href="{{ route('automovel.create') }}" class="btn btn-primary">Novo automóvel</a>
</div>

<div class="table-wrap">
    <table class="table">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Placa</th>
                <th>Chassi</th>
                <th>Montadora</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($automoveis as $a)
                <tr>
                    <td>{{ $a->nome }}</td>
                    <td>{{ $a->placa }}</td>
                    <td>{{ $a->chassi }}</td>
                    <td>{{ $a->montadora->nome ?? '-' }}</td>
                    <td class="actions">
                        <a href="{{ route('automovel.show', $a) }}">Ver</a>
                        <a href="{{ route('automovel.edit', $a) }}">Editar</a>
                        <form action="{{ route('automovel.destroy', $a) }}" method="post" onsubmit="return confirm('Excluir este automóvel?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Nenhum automóvel encontrado.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

@if($automoveis->hasPages())
    <div class="pagination">
        {{ $automoveis->withQueryString()->links('pagination.simple') }}
    </div>
@endif
@endsection
