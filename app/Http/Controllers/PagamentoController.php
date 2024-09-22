<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Pagamento;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    public function index()
    {
        $pagamentos = Pagamento::all();
        return response()->json($pagamentos);
    }

    public function store(Request $request)
    {
        // Validar os dados do formulário
        $validatedData = $request->validate([
            'descricao' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'categoria' => 'required|string', // ou 'required|exists:categorias,id' se você tiver uma tabela de categorias
            'vlr_transacao' => 'required|numeric|min:0',
            'dt_ref' => 'required|date',
        ]);
    
        // Criar uma nova instância de Pagamento
        $pagamento = new Pagamento();
        $pagamento->descricao = $validatedData['descricao'];
        $pagamento->categoria_id = $validatedData['categoria'];
        $pagamento->valor = $validatedData['vlr_transacao'];
        $pagamento->tipo = $validatedData['tipo'];
        $pagamento->data = $validatedData['dt_ref'];
    
        // Salvar o pagamento no banco de dados
        $pagamento->save();
    
        return redirect()->route('home.index');
    }
    

    public function show($id)
    {
        $pagamento = Pagamento::findOrFail($id);
        return response()->json($pagamento);
    }

   
    public function update(Request $request, $id)
    {
        // Validação dos dados recebidos
        $request->validate([
            'categoria' => 'required|integer',
            'vlr_transacao' => 'required|numeric',
            'dt_ref' => 'required|date',
            'descricao' => 'nullable|string',
            'tipo_editar' => 'required|string|size:1', // Assumindo que o tipo deve ter exatamente 1 caractere
        ]);

        // Encontrar o pagamento pelo ID
        $pagamento = Pagamento::findOrFail($id);

        // Atualizar os campos do pagamento com os dados do request
        $pagamento->update([
            'categoria_id' => $request->input('categoria'),
            'valor' => $request->input('vlr_transacao'),
            'data' => $request->input('dt_ref'),
            'descricao' => $request->input('descricao'),
            'tipo' => $request->input('tipo_editar'),
        ]);

        // Redirecionar com mensagem de sucesso
        return redirect()->back()->with('success', 'Atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Pagamento::destroy($id);
        // Redirecionar com mensagem de sucesso
        return redirect()->back()->with('success', 'Deletado com sucesso!');
    }
   
}
