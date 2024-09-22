<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\ClienteDemanda;
use App\Models\Pagamento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class detalhamentoController extends Controller
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

        $pagamentos = $query->get();

        $total_entradas = $pagamentos->where('tipo', 'R')->sum('valor');
        $total_saidas = $pagamentos->where('tipo', 'D')->sum('valor');
        $total_geral = $total_entradas - $total_saidas;
        
        $categoria = Categoria::all();

        $clientes = ClienteDemanda::with('enderecos')->get();

        $pagamento_agrupados = Pagamento::with('categoria')->select('categoria_id','data', 'tipo', DB::raw('SUM(valor) as total'))
        ->groupBy('categoria_id', 'tipo','data')
        ->get();
      
       
        return view('detalhamento', compact('pagamento_agrupados','categoria','clientes','tipo', 'total_geral', 'pagamentos', 'total_entradas', 'total_saidas', 'datas', 'mes', 'ano'));
    }
}
