@extends('layouts.app')

@section('title', 'Editar automóvel')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
    <h1 class="h3 m-0">Editar automóvel</h1>
    <div class="d-flex gap-2">
        <a href="{{ route('automovel.show', $automovel) }}" class="btn btn-outline-primary">Ver</a>
        <a href="{{ route('automovel.index') }}" class="btn btn-outline-secondary">Voltar</a>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('automovel.update', $automovel) }}" method="post">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label class="form-label" for="nome">Nome *</label>
                <input class="form-control" type="text" id="nome" name="nome" value="{{ old('nome', $automovel->nome) }}"
                    required autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label" for="placa">Placa * (XXX0000 ou XXX0X00)</label>
                <input class="form-control" type="text" id="placa" name="placa"
                    value="{{ old('placa', $automovel->placa) }}" required maxlength="7" placeholder="Ex: ABC1D23">
            </div>
            <div class="mb-3">
                <label class="form-label" for="chassi">Chassi *</label>
                <input class="form-control" type="text" id="chassi" name="chassi"
                    value="{{ old('chassi', $automovel->chassi) }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="montadora_id">Montadora *</label>
                <select class="form-select" id="montadora_id" name="montadora_id" required>
                    <option value="">Selecione...</option>
                    @foreach($montadoras as $m)
                        <option value="{{ $m->id }}" {{ old('montadora_id', $automovel->montadora_id) == $m->id ? 'selected' : '' }}>
                            {{ $m->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Atualizar</button>
                <a href="{{ route('automovel.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
