@extends('layouts.app')

@section('title', 'Dashboard')

@section('header', 'Dashboard')

@section('content')
    <div class="table-responsive">
        <table id="myTable" class="table table-striped table-bordered">
            <thead class="table-light">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Data de Registro</th>
                    <th>Valor</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Maria Silva</td>
                    <td>maria@example.com</td>
                    <td>2023-01-01</td>
                    <td class="money">R$ 1.500,00</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>João Santos</td>
                    <td>joao@example.com</td>
                    <td>2023-02-15</td>
                    <td class="money">R$ 2.000,00</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Ana Souza</td>
                    <td>ana@example.com</td>
                    <td>2023-03-20</td>
                    <td class="money">R$ 1.000,00</td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection
