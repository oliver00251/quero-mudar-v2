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
    <h4>Balanço do dia {{ now()->format('d/m/Y') }}</h4>
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
@include('modal.categoria-saida')
@include('modal.fornecedores')
@include('modal.clientes')

<script>
    $(document).ready(function() {
        $('#lancamentosTable').DataTable();
    });

    document.addEventListener('DOMContentLoaded', function() {
    // Selecionar todos os ícones de edição
    const editIcons = document.querySelectorAll('.fa-edit');

 
});
$(document).ready(function() {
    $('#toggleButton').click(function() {
        // Esconder o elemento do detalhamento
        $('#toggleElement-detalhamento').hide();
        // Alternar a exibição do elemento principal
        $('#toggleElement').toggle();
    });

    $('#toggleButtonDetalhamento').click(function() {
        // Esconder o elemento principal
        $('#toggleElement').hide();
        // Alternar a exibição do elemento de detalhamento
        $('#toggleElement-detalhamento').toggle();
    });
});



</script>

@endsection
