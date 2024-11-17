<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatório de Balanço Financeiro</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        h1, h3, h6 {
            text-align: center;
            color: #1d3557;
        }
        h6 {
            font-size: 16px;
        }
        /* Cabeçalho com nome da empresa e período */
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            font-size: 24px;
            margin-bottom: 5px;
        }
        .header h3 {
            font-size: 18px;
            margin-bottom: 5px;
        }
        .header h6 {
            font-size: 14px;
            margin-bottom: 10px;
        }
        /* Resumo do balanço */
        .summary {
            margin: 20px auto;
            width: 90%;
            font-size: 16px;
            border-bottom: 2px solid #1d3557;
            padding-bottom: 15px;
        }
        .summary p {
            margin: 10px 0;
        }
        .summary strong {
            color: #1d3557;
        }
        /* Estilos da Tabela */
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 12px 10px;
            text-align: right;
        }
        th {
            background-color: #f1f1f1;
            font-weight: bold;
        }
        td {
            background-color: #fafafa;
        }
        .bg-success {
            background-color: #28a745;
            color: white;
        }
        .bg-danger {
            background-color: #dc3545;
            color: white;
        }
        .text-left {
            text-align: left;
        }
    </style>
</head>
<body>

    <!-- Cabeçalho com nome da empresa e período -->
    <div class="header">
        <h1>Relatório de Balanço Financeiro</h1>
        <h3>Período: {{ \Carbon\Carbon::parse($start_date)->format('d/m/Y') }} a {{ \Carbon\Carbon::parse($end_date)->format('d/m/Y') }}</h3>
    </div>

    <!-- Resumo do balanço -->
    <div class="summary">
        <p><strong>Total de Entradas:</strong> € {{ number_format($total_entradas, 2, ',', '.') }}</p>
        <p><strong>Total de Saídas:</strong> € {{ number_format($total_saidas, 2, ',', '.') }}</p>
        <p><strong>Diferença (Entradas - Saídas):</strong> € {{ number_format($total_entradas - $total_saidas, 2, ',', '.') }}</p>
    </div>

    <!-- Tabela de dados -->
    <table>
        <thead>
            <tr>
                <th class="text-left">Categoria</th>
                <th>Total Entradas</th>
                <th>Total Saídas</th>
                <th>Data Referência</th>
            </tr>
        </thead>
        <tbody>
            @forelse($somaPorCategoria as $item)
            <tr>
                <td class="text-left">{{ $item->categoria->nome ?? 'N/A' }}</td>
                <td class="bg-success">€ {{ number_format($item->total_entradas, 2, ',', '.') }}</td>
                <td class="bg-danger">€ {{ number_format($item->total_saidas, 2, ',', '.') }}</td>
                <td>{{ \Carbon\Carbon::parse($item->data)->format('d/m/Y') }}</td>
            </tr>
            @empty
            <tr>
                <td colspan="4" style="text-align: center;">Nenhum dado disponível para o período selecionado.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</body>
</html>
