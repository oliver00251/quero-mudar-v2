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
                    <form  method="GET" action="{{ route('home.index') }}" class="form-inline  p-3">
                        @csrf
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
    <h4>
       <div class="text-muted">
            @if($sem_data_periodo) <!-- Verifica se o usuário não escolheu um período -->
            @php
            \Carbon\Carbon::setLocale('pt_BR'); // Configura o Carbon para português
            @endphp
            <h4>Balanço do mês de {{ now()->translatedFormat('F Y') }}</h4>
        
            @else
                <h4>Balanço do período: {{ \Carbon\Carbon::parse($start_date)->format('d/m/Y') }} a {{ \Carbon\Carbon::parse($end_date)->format('d/m/Y') }}</h4>
            @endif
        </div>
        

    </h4>
</div>
@include('partials.cards')
{{-- Exibir Lançamentos --}}
<div id="toggleElement" >
   @include('lancamentos')
</div>
{{-- Relatorio Por Categoria --}}
<div id="toggleElement-detalhamento" style="display: none">
    @include('detalhamento-categoria')
 </div>
 {{-- exibir clientes --}}
 <div id="toggleElement-cliente" style="display: none">
    @include('clientes_demandas')
 </div>

<style>
    li.list-group-item {
        display: flex;
        justify-content: space-between;
    }
</style>
@include('modal.clientes-moradas')
@include('partials.modal')
@include('modal.entradas')
@include('modal.saidas')
@include('modal.categoria')
@include('modal.categoria-saida')
@include('modal.fornecedores')
@include('modal.clientes')
@include('modal.cadastrar-veiculo')

<script>
    $(document).ready(function() {
        $('#lancamentosTable').DataTable();
    });

    document.addEventListener('DOMContentLoaded', function() {
    // Selecionar todos os ícones de edição
    const editIcons = document.querySelectorAll('.fa-edit');

 
});
$(document).ready(function() {
    function toggleSingleElement(showElement) {
        // Esconde todos os elementos que você quer alternar
        $('#toggleElement, #toggleElement-detalhamento, #toggleElement-cliente').hide();
        // Exibe o elemento clicado
        $(showElement).show();
    }

    // Clique no botão para alternar o gráfico de linha
    $('#toggleButton').click(function() {
        toggleSingleElement('#toggleElement');
    });

    // Clique no botão para alternar o detalhamento
    $('#toggleButtonDetalhamento').click(function() {
        toggleSingleElement('#toggleElement-detalhamento');
    });

    // Clique no botão para alternar as demandas de clientes
    $('#clientes_demandas').click(function() {
        toggleSingleElement('#toggleElement-cliente');
    });
});




</script>

@endsection
