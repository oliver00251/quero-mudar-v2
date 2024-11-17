<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data = $request->validate([
            'placa' => 'required|string|max:10',
            'modelo' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            
        ]);

        Veiculo::create($data);

        return redirect()->back()->with('success', 'Veículo cadastrado com sucesso!');
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Buscar o veículo pelo ID
        $veiculo = Veiculo::find($id);
    
        // Verificar se o veículo existe
        if (!$veiculo) {
            return redirect()->back()->with('error', 'Veículo não encontrado.');
        }
    
        // Excluir o veículo
        $veiculo->delete();
    
        // Redirecionar com mensagem de sucesso
        return redirect()->back()->with('success', 'Veículo excluído com sucesso!');
    }
}
