<?php

namespace App\Http\Controllers;

use App\Models\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index()
    {
        $fornecedores = Fornecedor::all();
        return response()->json($fornecedores);
    }

    public function store(Request $request)
    {
        $fornecedor = Fornecedor::create($request->all());
        return response()->json($fornecedor, 201);
    }

    public function show($id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        return response()->json($fornecedor);
    }

    public function update(Request $request, $id)
    {
        $fornecedor = Fornecedor::findOrFail($id);
        $fornecedor->update($request->all());
        return response()->json($fornecedor);
    }

    public function destroy($id)
    {
        Fornecedor::destroy($id);
        return response()->json(null, 204);
    }
}
