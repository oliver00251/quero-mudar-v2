<?php
namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\ClienteDemanda;
use App\Models\Pagamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        // Se 'dia', 'mes' e 'ano' não forem fornecidos, use a data atual
        $dia = $request->input('dia', now()->day);    // Padrão: dia atual
        $mes = $request->input('mes', now()->month);  // Padrão: mês atual
        $ano = $request->input('ano', now()->year);   // Padrão: ano atual
        $tipo = $request->input('tipo');

        // Buscar os meses, anos e dias únicos da coluna data
        $datas = Pagamento::select(DB::raw('DISTINCT DAY(data) as dia, MONTH(data) as mes, YEAR(data) as ano'))
            ->orderBy('ano', 'desc')
            ->orderBy('mes', 'desc')
            ->orderBy('dia', 'desc')
            ->get();

        // Filtrar os pagamentos com base nos parâmetros dia, mes e ano
        $query = Pagamento::with('categoria')->orderBy('data', 'desc');

        // Sempre filtra por dia, mês e ano (com valores padrão definidos acima)
        $query->whereDay('data', $dia)
            ->whereMonth('data', $mes)
            ->whereYear('data', $ano);

        // Filtrar por tipo se fornecido
        if ($tipo) {
            $query->where('tipo', $tipo);
        }

        $pagamentos = $query->get();

        // Calcular totais
        $total_entradas = $pagamentos->where('tipo', 'R')->sum('valor');
        $total_saidas = $pagamentos->where('tipo', 'D')->sum('valor');
        $total_geral = $total_entradas - $total_saidas;

        $categoria = Categoria::orderBy('ordem')->get();
        $clientes = ClienteDemanda::with('enderecos')->get();

        $pagamentos = Pagamento::with('categoria')->orderBy('data', 'desc')->get();
        //dd($pagamentos);

        return view('welcome', compact('categoria', 'clientes', 'tipo', 'total_geral', 'pagamentos', 'total_entradas', 'total_saidas', 'datas', 'dia', 'mes', 'ano'));
    }


    public function cliente()
    {
        $clientesDemandas = ClienteDemanda::with('enderecos')->get();
        return view('clientes_demandas-teste', compact('clientesDemandas'));
    }
}
