@extends('layouts.app')

@section('title', 'Cadastrar automóvel')

@section('content')
<div class="d-flex flex-wrap justify-content-between align-items-center gap-3 mb-3">
    <h1 class="h3 m-0">Novo automóvel</h1>
    <a href="{{ route('automovel.index') }}" class="btn btn-outline-secondary">Voltar</a>
</div>

<div class="card">
    <div class="card-body">
        <form action="{{ route('automovel.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label class="form-label" for="nome">Nome *</label>
                <input class="form-control" type="text" id="nome" name="nome" value="{{ old('nome') }}" required
                    autofocus>
            </div>
            <div class="mb-3">
                <label class="form-label" for="placa">Placa * (XXX0000 ou XXX0X00)</label>
                <input class="form-control" type="text" id="placa" name="placa" value="{{ old('placa') }}" required
                    maxlength="7" placeholder="Ex: ABC1D23">
            </div>
            <div class="mb-3">
                <label class="form-label" for="chassi">Chassi *</label>
                <input class="form-control" type="text" id="chassi" name="chassi" value="{{ old('chassi') }}" required>
            </div>
            <div class="mb-3">
                <label class="form-label" for="montadora_id">Montadora *</label>
                <select class="form-select" id="montadora_id" name="montadora_id" required>
                    <option value="">Selecione...</option>
                    @foreach($montadoras as $m)
                        <option value="{{ $m->id }}" {{ old('montadora_id') == $m->id ? 'selected' : '' }}>
                            {{ $m->nome }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-primary">Salvar</button>
                <a href="{{ route('automovel.index') }}" class="btn btn-secondary">Cancelar</a>
            </div>
        </form>
    </div>
</div>
@endsection
