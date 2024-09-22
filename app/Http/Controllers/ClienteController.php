<?php

namespace App\Http\Controllers;

use App\Models\ClienteDemanda;
use App\Models\Endereco;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function store(Request $request)
    {
        $cliente = new ClienteDemanda();
        $cliente->data = $request->data;
        $cliente->nome_cliente = $request->nomeCliente;
        $cliente->telefone = $request->telefoneCliente;
        $cliente->email = $request->emailCliente;
        $cliente->save();

        $endereco = new Endereco();
        $endereco->cliente_demanda_id = $cliente->id;
        $endereco->tipo = $request->tipoEndereco;
        $endereco->rua = $request->rua;
        $endereco->cidade = $request->cidade;
        $endereco->regiao = $request->regiao;
        $endereco->codigo_postal = $request->codigoPostal;
        $endereco->pais = $request->pais;
        $endereco->complemento = $request->complemento;
        $endereco->save();

        return redirect()->back()->with('success', 'Cliente cadastrado com sucesso!');
    }
    public function storeMorada(Request $request)
    {
      
       /*  dd($request->all()); */
        $endereco = new Endereco();
        $endereco->cliente_demanda_id = $request->id_morada;
        $endereco->tipo = $request->tipoEndereco;
        $endereco->rua = $request->rua;
        $endereco->cidade = $request->cidade;
        $endereco->regiao = $request->regiao;
        $endereco->codigo_postal = $request->codigoPostal;
        $endereco->pais = $request->pais;
        $endereco->complemento = $request->complemento;
        $endereco->save();

        return redirect()->back()->with('success', 'Morada cadastrada com sucesso!');
    }

    public function update(Request $request, $id)
    {
        // Valida os dados recebidos
        $validatedData = $request->validate([
            'nomeCliente' => 'required|string|max:255',
            'telefoneCliente' => 'nullable|string|max:20',
            'emailCliente' => 'nullable|email|max:455',
            'rua' => 'required|string|max:255',
            'cidade' => 'required|string|max:255',
            'regiao' => 'nullable|string|max:255',
            'codigoPostal' => 'nullable|string|max:20',
            'pais' => 'required|string|max:255',
            'complemento' => 'nullable|string|max:255',
        ]);

        // Encontra o cliente pelo ID
        $cliente = ClienteDemanda::findOrFail($id);

        // Atualiza as informações do cliente
        $cliente->update([
            'nome_cliente' => $validatedData['nomeCliente'],
            'telefone' => $validatedData['telefoneCliente'],
            'email' => $validatedData['emailCliente'],
        ]);

        // Atualiza o endereço associado
        $endereco = $cliente->enderecos()->first(); // Assumindo que há apenas um endereço associado

        if ($endereco) {
            $endereco->update([
                'rua' => $validatedData['rua'],
                'cidade' => $validatedData['cidade'],
                'regiao' => $validatedData['regiao'],
                'codigo_postal' => $validatedData['codigoPostal'],
                'pais' => $validatedData['pais'],
                'complemento' => $validatedData['complemento'],
            ]);
        }

        // Redireciona de volta com uma mensagem de sucesso
        return redirect()->back()->with('success', 'Cliente atualizado com sucesso!');
    }


    // Método para excluir um cliente e seus endereços
    public function destroy($id)
    {
        $cliente = ClienteDemanda::findOrFail($id);
        $cliente->enderecos()->delete(); // Exclui os endereços associados
        $cliente->delete(); // Exclui o cliente

        return redirect()->back()->with('success', 'Cliente excluído com sucesso!');
    }
}
