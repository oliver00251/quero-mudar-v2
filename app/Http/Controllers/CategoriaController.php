<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index()
    {
        $categorias = Categoria::all();
        return response()->json($categorias);
    }
    public function show($id)
    {
        $categoria = Categoria::findOrFail($id);
        return response()->json($categoria);
    }

    public function store(Request $request)
    {

        //dd($request->all());
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'ordem' => 'required|integer',
            'tipo' => 'required|string|in:despesa,receita',
        ]);
    
        // Usar updateOrCreate para atualizar ou criar a categoria
        $categoria = Categoria::updateOrCreate(
            ['id' => $request->id], // Condição de busca
            $request->all() // Dados para atualizar ou criar
        );
    
        // Redirecionar após a operação
        return redirect()->route('home.index')->with('success', 'Categoria salva com sucesso!');
    }
    


    public function update(Request $request)
    {
        // Validação dos dados
        $request->validate([
            'nome' => 'required|string|max:255',
            'ordem' => 'required|integer',
            'tipo' => 'required|string|in:despesa,receita', // Ajuste os tipos conforme necessário
        ]);

        // Encontrar a categoria e atualizar
        $categoria = Categoria::findOrFail($request->id);
        $categoria->update($request->all());

        // Redirecionar após a atualização
        return redirect()->route('home.index')->with('success', 'Categoria atualizada com sucesso!');
    }


    public function destroy($id)
    {
        Categoria::destroy($id);
        return response()->json(null, 204);
    }
}
