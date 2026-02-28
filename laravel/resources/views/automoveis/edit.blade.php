@extends('layouts.app')

@section('title', 'Editar automóvel')

@section('content')
<h1 class="page-title">Editar automóvel</h1>

<div class="card">
    <form action="{{ route('automovel.update', $automovel) }}" method="post">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome *</label>
            <input type="text" id="nome" name="nome" value="{{ old('nome', $automovel->nome) }}" required autofocus>
        </div>
        <div class="form-group">
            <label for="placa">Placa * (XXX0000 ou XXX0X00)</label>
            <input type="text" id="placa" name="placa" value="{{ old('placa', $automovel->placa) }}" required maxlength="7" placeholder="Ex: ABC1D23">
        </div>
        <div class="form-group">
            <label for="chassi">Chassi *</label>
            <input type="text" id="chassi" name="chassi" value="{{ old('chassi', $automovel->chassi) }}" required>
        </div>
        <div class="form-group">
            <label for="montadora_id">Montadora *</label>
            <select id="montadora_id" name="montadora_id" required>
                <option value="">Selecione...</option>
                @foreach($montadoras as $m)
                    <option value="{{ $m->id }}" {{ old('montadora_id', $automovel->montadora_id) == $m->id ? 'selected' : '' }}>{{ $m->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Atualizar</button>
            <a href="{{ route('automovel.index') }}" class="btn btn-secondary">Cancelar</a>
            <a href="{{ route('automovel.show', $automovel) }}" class="btn btn-secondary">Ver</a>
        </div>
    </form>
</div>
@endsection
