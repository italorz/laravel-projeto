<?php

namespace App\Http\Controllers;

use App\Http\Requests\AutomovelRequest;
use App\Models\Automovel;
use App\Models\Montadora;
use App\Repositories\AutomovelRepository;
use Illuminate\Http\Request;

class AutomovelController extends Controller
{
    public function __construct(private AutomovelRepository $repo) {}

    public function index(Request $request)
    {
        $montadoras = Montadora::orderBy('nome')->get();

        $montadoraId = $request->integer('montadora_id') ?: null;
        $automoveis = $this->repo->paginateWithMontadora($montadoraId);

        return view('automoveis.index', compact('automoveis', 'montadoras'));
    }

    public function create()
    {
        $montadoras = Montadora::orderBy('nome')->get();
        return view('automoveis.create', compact('montadoras'));
    }

    public function store(AutomovelRequest $request)
    {

        try {
            $this->repo->create($request->validated());
            return redirect()->route('automovel.index')->with('success', 'Automóvel criado com sucesso');
        } catch (\Exception $e) {
            return redirect()->route('automovel.index')->with('error', 'Erro ao criar automóvel');
        }
    }

    public function show(int $id)
    {
        try {
            return $this->repo->find($id);
        } catch (\Exception $e) {
            return redirect()->route('automovel.index')->with('error', 'Erro ao exibir automóvel');
        }
    }
    public function edit(int $id)
    {
        try {
            $automovel = $this->repo->find($id);
            $montadoras = Montadora::orderBy('nome')->get();
            return view('automoveis.edit', compact('automovel', 'montadoras'));
        } catch (\Exception $e) {
            return redirect()->route('automovel.index')->with('error', 'Erro ao editar automóvel');
        }
    }
    public function destroy(Automovel $automovel)
    {
        $this->repo->delete($automovel->id);
        return redirect()->route('automovel.index')->with('success', 'Automóvel excluído com sucesso');
    }
    public function getByMontadora(int $id)
    {
        try {
            return redirect()->route('automovel.index', ['montadora_id' => $id]);
        } catch (\Exception $e) {
            return redirect()->route('automovel.index')->with('error', 'Erro ao buscar automóveis');
        }
    }
}
