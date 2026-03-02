@extends('layouts.app')

@section('title', 'Detalhe do automóvel')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
    <div>
        <a href="{{ route('automovel.index') }}" class="btn btn-link px-0">← Voltar à listagem</a>
        <h1 class="h3 m-0">{{ $automovel->nome }}</h1>
    </div>
    <div class="d-flex gap-2">
        <a href="{{ route('automovel.edit', $automovel) }}" class="btn btn-primary">Editar</a>
        <form action="{{ route('automovel.destroy', $automovel) }}" method="post"
            onsubmit="return confirm('Excluir este automóvel?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <dl class="row mb-0">
            <dt class="col-sm-3">Nome</dt>
            <dd class="col-sm-9">{{ $automovel->nome }}</dd>

            <dt class="col-sm-3">Placa</dt>
            <dd class="col-sm-9">{{ $automovel->placa }}</dd>

            <dt class="col-sm-3">Chassi</dt>
            <dd class="col-sm-9">{{ $automovel->chassi }}</dd>

            <dt class="col-sm-3">Montadora</dt>
            <dd class="col-sm-9">{{ $automovel->montadora->nome ?? '-' }}</dd>
        </dl>
    </div>
</div>
@endsection
