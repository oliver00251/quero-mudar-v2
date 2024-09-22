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
        $mes = $request->input('mes');
        $ano = $request->input('ano');
        $tipo = $request->input('tipo');

        // Buscar os meses e anos únicos da coluna data
        $datas = Pagamento::select(DB::raw('DISTINCT MONTH(data) as mes, YEAR(data) as ano'))
            ->orderBy('ano', 'desc')
            ->orderBy('mes', 'desc')
            ->get();

        // Filtrar os pagamentos com base nos parâmetros mes e ano
        $query = Pagamento::with('categoria')->orderBy('data', 'desc');

        if ($mes && $ano) {
            $query->whereMonth('data', $mes)->whereYear('data', $ano);
        } elseif ($mes) {
            $query->whereMonth('data', $mes);
        } elseif ($ano) {
            $query->whereYear('data', $ano);
        }

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
        
        return view('welcome', compact('categoria', 'clientes', 'tipo', 'total_geral', 'pagamentos', 'total_entradas', 'total_saidas', 'datas', 'mes', 'ano'));
    }

    public function cliente()
    {
        $clientesDemandas = ClienteDemanda::with('enderecos')->get();
        return view('clientes_demandas-teste', compact('clientesDemandas'));
    }
}
