<?php

namespace App\Http\Controllers;

use App\Models\Pagamento;
use Illuminate\Http\Request;

class PagamentoController extends Controller
{
    // Método para listar todos os pagamentos
    public function index()
    {
        $pagamentos = Pagamento::all();
        return response()->json($pagamentos);
    }

    // Método para armazenar um novo pagamento ou atualizar um existente
    public function store(Request $request)
    {
        try {
            // Validar os dados de entrada
            $request->validate([
                'categoria' => 'required|integer',
                'vlr_transacao' => 'required|numeric',
                'tipo' => 'required|string',
                'dt_ref' => 'required|date',
                'veiculo' => 'nullable|string|max:255',
                'qtd_horas' => 'nullable|integer',
                'vlr_hora' => 'nullable|numeric',
                'qtd_ajudante' => 'nullable|integer',
            ]);

            // Criar ou atualizar a instância de Pagamento
            $pagamento = $request->id ? Pagamento::findOrFail($request->id) : new Pagamento();
            $pagamento->descricao = $request->descricao;
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

            return redirect()->route('home.index')->with('success', 'Registro ' . ($request->id ? 'atualizado' : 'criado') . ' com sucesso!');
        } catch (\Exception $e) {
            // Log da exceção (opcional)
            \Log::error('Erro ao criar ou atualizar pagamento: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Erro ao criar ou atualizar pagamento. Tente novamente.')->withInput();
        }
    }

    // Método para excluir um pagamento
    public function destroyPagamento($id)
{
    $pagamento = Pagamento::find($id);

    if ($pagamento) {
        $pagamento->delete();
        return redirect()->back()->with('success', 'Deletado com sucesso!');
    } else {
        return redirect()->back()->with('error', 'Pagamento não encontrado.');
    }
}

}
