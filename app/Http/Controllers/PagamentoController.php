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
        try {
          
    
            // Criar uma nova instância de Pagamento
            $pagamento = new Pagamento();
            $pagamento->descricao = $request->descricao ?? '-';
            $pagamento->categoria_id = $request->categoria;
            $pagamento->valor = $request->vlr_transacao;
            $pagamento->tipo = $request->tipo;
            $pagamento->data = $request->dt_ref;
            $pagamento->veiculo = $request->veiculo;
            $pagamento->qtd_horas = $request->qtd_horas;
            $pagamento->vlr_hora = $request->vlr_hora;
            $pagamento->qtd_ajudante = $request->qtd_ajudante;
    
            // Salvar o pagamento no banco de dados
            $pagamento->save();
    
            return redirect()->route('home.index')->with('success', 'Pagamento criado com sucesso!');
    
        } catch (\Exception $e) {
            // Log da exceção (opcional)
            \Log::error('Erro ao criar pagamento: ' . $e->getMessage());
    
            // Redirecionar com uma mensagem de erro
            return redirect()->back()->with('error', 'Erro ao criar pagamento. Tente novamente.')->withInput();
        }
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
