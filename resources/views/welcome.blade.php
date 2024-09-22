@extends('layouts.app')

@section('title', 'Dashboard')

@section('header', 'Dashboard')

@section('content')

<div id="collapseExample" class="bg-white col-sm-12 card mb-3 ">
    <div class="card">
        <div class="card-header">
            <h6 class="text-uppercase">Consultar balanço por periodo</h6>
        </div>
        <div class="card-body">
            <div class="row mb-4">
                <div class="col-md-12 ">
                    <form  method="GET" {{-- action="{{ route('sua.rota.de.dashboard') }}" --}} class="form-inline  p-3">
                        <div class="form-row align-items-center">
                            <div class="col-md-4 mt-2">
                                <input type="date" name="start_date" value="{{ request('start_date', now()->format('Y-m-d')) }}" class="form-control" placeholder="Data Inicial">
                            </div>
                            <div class="col-md-4 mt-2">
                                <input type="date" name="end_date" value="{{ request('end_date', now()->format('Y-m-d')) }}" class="form-control" placeholder="Data Final">
                            </div>
                            <div class="col-md-4 mt-2">
                                <button type="submit" class="btn btn-primary">Filtrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
</div>
<div class="text-muted">
    <h4>Balanço do dia {{ now()->format('d/m/Y') }}</h4>
</div>
@include('partials.cards')

<div class="row mb-4">
    <div class="col-md-2">
        <ul class="list-group">
            <li class="list-group-item active d-flex justify-content-between" data-bs-toggle="modal" data-bs-target="#modalCategoria">
                <span>Entradas</span>
                <span><i class="fa fa-plus-circle" aria-hidden="true" style="cursor: pointer;"></i></span>
            </li>
            
            @foreach($categoria as $cat)
            <li class="list-group-item">
                <span>{{ $cat->nome }}</span>
                <span><i class="fa fa-plus-circle" aria-hidden="true" style="cursor: pointer;"></i></span>
            </li>
            @endforeach
        </ul>
    </div>

    <div class="col-md-8">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Lançamentos</h5>
            </div>
            <div class="card-body">
                <table id="lancamentosTable" class="table table-striped table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Tipo</th>
                            <th>Descrição</th>
                            <th>Categoria</th>
                            <th>Valor</th>
                            <th>Data Referência</th>
                            <th>Data Lançamento</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pagamentos as $pagamento)
                        <tr>
                            <td>{{ $pagamento->tipo == 'R' ? 'Receita' : 'Despesa' }}</td>
                            <td>{{ $pagamento->descricao }}</td>
                            <td>{{ $pagamento->categoria->nome ?? 'N/A' }}</td>
                            <td>{{ number_format($pagamento->valor, 2, ',', '.') }}</td>
                            <td>{{ \Carbon\Carbon::parse($pagamento->data)->format('d/m/Y') }}</td>
                            <td>{{ $pagamento->created_at ? $pagamento->created_at->format('d/m/Y H:i') : 'N/A' }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="col-md-2">
        <ul class="list-group">
            <li class="list-group-item active bg-danger border-0 d-flex justify-content-between" id="cad_saidas" aria-current="true">
                <span>Saídas</span>
                <span><i class="fa fa-plus-circle" aria-hidden="true" style="cursor: pointer;"></i></span>
            </li>
            @foreach($categoria as $cat)
            <li class="list-group-item">
                <span>{{ $cat->nome }}</span>
                <span><i class="fa fa-plus-circle" aria-hidden="true" style="cursor: pointer;"></i></span>
            </li>
            @endforeach
        </ul>
    </div>
</div>

<style>
    li.list-group-item {
        display: flex;
        justify-content: space-between;
    }
</style>

@include('partials.modal')
@include('modal.entradas')
@include('modal.saidas')
@include('modal.categoria')
@include('modal.fornecedores')
@include('modal.clientes')

<script>
    $(document).ready(function() {
        $('#lancamentosTable').DataTable();
    });
</script>
@endsection
