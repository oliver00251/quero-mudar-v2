<div class="col-md container">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5>Detalhamento</h5>
        </div>
        <div class="card-body">
            <table id="lancamentosTable" class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>Categoria</th>
                        <th>Total Entradas</th>
                        <th>Total Saídas</th>
                        <th>Data Referência</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($somaPorCategoria as $item)
                    <tr>
                        <td>{{ $item->categoria->nome ?? 'N/A' }}</td>
                        <td class="bg-success text-white">€ {{ number_format($item->total_entradas, 2, ',', '.') }}</td>
                        <td class="bg-danger text-white">€ {{ number_format($item->total_saidas, 2, ',', '.') }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->data)->format('d/m/Y') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>