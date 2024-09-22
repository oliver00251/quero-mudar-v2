<?php

namespace App\Http\Controllers;

use App\Models\Conta;
use Illuminate\Http\Request;

class ContaController extends Controller
{
    public function index()
    {
        $contas = Conta::all();
        return response()->json($contas);
    }

    public function store(Request $request)
    {
        $conta = Conta::create($request->all());
        return response()->json($conta, 201);
    }

    public function show($id)
    {
        $conta = Conta::findOrFail($id);
        return response()->json($conta);
    }

    public function update(Request $request, $id)
    {
        $conta = Conta::findOrFail($id);
        $conta->update($request->all());
        return response()->json($conta);
    }

    public function destroy($id)
    {
        Conta::destroy($id);
        return response()->json(null, 204);
    }
}
