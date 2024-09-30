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
    // Se as datas não forem fornecidas, usar a data atual como padrão
    $start_date = $request->input('start_date', now()->format('Y-m-d'));
    $end_date = $request->input('end_date', now()->format('Y-m-d'));
    $tipo = $request->input('tipo');

    // Verificar se o usuário não forneceu um intervalo de datas
    $sem_data_periodo = ($request->input('start_date') == null && $request->input('end_date') == null);

    // Buscar os meses, anos e dias únicos da coluna data (se precisar para o dropdown)
    $datas = Pagamento::select(DB::raw('DISTINCT DAY(data) as dia, MONTH(data) as mes, YEAR(data) as ano'))
        ->orderBy('ano', 'desc')
        ->orderBy('mes', 'desc')
        ->orderBy('dia', 'desc')
        ->get();

    // Filtrar os pagamentos com base no intervalo de datas
    $query = Pagamento::with('categoria')->orderBy('data', 'desc');

    // Filtrar por intervalo de datas
    $query->whereBetween('data', [$start_date, $end_date]);

    // Filtrar por tipo se fornecido
    if ($tipo) {
        $query->where('tipo', $tipo);
    }

    $pagamentos = $query->get();

    // Calcular totais
    $total_entradas = $pagamentos->where('tipo', 'R')->sum('valor');
    $total_saidas = $pagamentos->where('tipo', 'D')->sum('valor');
    $total_geral = $total_entradas - $total_saidas;

    // Somar receitas e despesas por categoria e data
    $somaPorCategoria = Pagamento::with('categoria')
        ->select('categoria_id', DB::raw('DATE(data) as data'))
        ->selectRaw('SUM(CASE WHEN tipo = "R" THEN valor ELSE 0 END) as total_entradas')
        ->selectRaw('SUM(CASE WHEN tipo = "D" THEN valor ELSE 0 END) as total_saidas')
        ->whereBetween('data', [$start_date, $end_date])
        ->groupBy('categoria_id', 'data')
        ->get();

    $categoria = Categoria::orderBy('ordem')->get();
    $clientes = ClienteDemanda::with('enderecos')->get();

    // Retornar a view com as variáveis
    return view('welcome', compact('categoria', 'clientes', 'tipo', 'total_geral', 'pagamentos', 'total_entradas', 'total_saidas', 'datas', 'start_date', 'end_date', 'somaPorCategoria', 'sem_data_periodo'));
}

    
    


    public function cliente()
    {
        $clientesDemandas = ClienteDemanda::with('enderecos')->get();
        return view('clientes_demandas-teste', compact('clientesDemandas'));
    }
}
