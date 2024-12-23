<?php
namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\ClienteDemanda;
use App\Models\Pagamento;
use App\Models\Veiculo;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
{
    // Se as datas não forem fornecidas, usar a data atual como padrão
   /*  $start_date = $request->input('start_date', now()->format('Y-m-d'));
    $end_date = $request->input('end_date', now()->format('Y-m-d')); */
    // Se as datas não forem fornecidas, usar o primeiro e o último dia do mês atual como padrão
    $start_date = $request->input('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
    $end_date = $request->input('end_date', Carbon::now()->endOfMonth()->format('Y-m-d'));
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
    ->select('categoria_id')
    ->selectRaw('SUM(CASE WHEN tipo = "R" THEN valor ELSE 0 END) as total_entradas')
    ->selectRaw('SUM(CASE WHEN tipo = "D" THEN valor ELSE 0 END) as total_saidas')
    ->whereBetween('data', [$start_date, $end_date])
    ->groupBy('categoria_id')
    ->get();

        //dd($somaPorCategoria,$start_date, $end_date);

    $categoria = Categoria::orderBy('ordem')->get();
    $clientes = ClienteDemanda::with('enderecos')->get();
    $veiculos = Veiculo::get();
    


    // Retornar a view com as variáveis
    return view('welcome', compact('categoria', 'clientes','veiculos', 'tipo', 'total_geral', 'pagamentos', 'total_entradas', 'total_saidas', 'datas', 'start_date', 'end_date', 'somaPorCategoria', 'sem_data_periodo'));
}

    
   
public function gerarRelatorio(Request $request)
{
    // Filtrar por data no relatório
    $start_date = $request->input('start_date', Carbon::now()->startOfMonth()->format('Y-m-d'));
    $end_date = $request->input('end_date', Carbon::now()->endOfMonth()->format('Y-m-d'));

    // Somar receitas e despesas por categoria e data no período solicitado
    $somaPorCategoria = Pagamento::with('categoria')
    ->select('categoria_id')
    ->selectRaw('SUM(CASE WHEN tipo = "R" THEN valor ELSE 0 END) as total_entradas')
    ->selectRaw('SUM(CASE WHEN tipo = "D" THEN valor ELSE 0 END) as total_saidas')
    ->whereBetween('data', [$start_date, $end_date])
    ->groupBy('categoria_id')
    ->get();

    // Somar o total de entradas e saídas no período selecionado
    $total_entradas = Pagamento::where('tipo', 'R')
        ->whereBetween('data', [$start_date, $end_date])
        ->sum('valor');

    $total_saidas = Pagamento::where('tipo', 'D')
        ->whereBetween('data', [$start_date, $end_date])
        ->sum('valor');

    // Carregar a view do relatório
    $pdf = Pdf::loadView('relatorios.balanco_financeiro', compact('somaPorCategoria', 'start_date', 'end_date', 'total_entradas', 'total_saidas'));

    // Retornar o PDF para download
    return $pdf->download('balanco_financeiro_' . Carbon::now()->format('Y_m_d') . '.pdf');
}



    public function cliente()
    {
        $clientesDemandas = ClienteDemanda::with('enderecos')->get();
        return view('clientes_demandas-teste', compact('clientesDemandas'));
    }



}
