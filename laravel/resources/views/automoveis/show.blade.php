@extends('layouts.app')

@section('title', 'Detalhe do automóvel')

@section('content')
<a href="{{ route('automovel.index') }}" class="back-link">← Voltar à listagem</a>
<h1 class="page-title">{{ $automovel->nome }}</h1>

<div class="detail-list">
    <dl>
        <dt>Nome</dt>
        <dd>{{ $automovel->nome }}</dd>
        <dt>Placa</dt>
        <dd>{{ $automovel->placa }}</dd>
        <dt>Chassi</dt>
        <dd>{{ $automovel->chassi }}</dd>
        <dt>Montadora</dt>
        <dd>{{ $automovel->montadora->nome ?? '-' }}</dd>
    </dl>
    <div class="form-actions" style="margin-top: 1.5rem;">
        <a href="{{ route('automovel.edit', $automovel) }}" class="btn btn-primary">Editar</a>
        <form action="{{ route('automovel.destroy', $automovel) }}" method="post" style="display: inline;" onsubmit="return confirm('Excluir este automóvel?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Excluir</button>
        </form>
    </div>
</div>
@endsection
