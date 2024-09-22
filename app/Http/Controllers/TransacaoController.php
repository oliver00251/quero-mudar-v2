<?php

namespace App\Http\Controllers;

use App\Models\Transacao;
use Illuminate\Http\Request;

class TransacaoController extends Controller
{
    public function index()
    {
        $transacoes = Transacao::all();
        return response()->json($transacoes);
    }

    public function store(Request $request)
    {
        $transacao = Transacao::create($request->all());
        return response()->json($transacao, 201);
    }

    public function show($id)
    {
        $transacao = Transacao::findOrFail($id);
        return response()->json($transacao);
    }

    public function update(Request $request, $id)
    {
        $transacao = Transacao::findOrFail($id);
        $transacao->update($request->all());
        return response()->json($transacao);
    }

    public function destroy($id)
    {
        Transacao::destroy($id);
        return response()->json(null, 204);
    }
}
