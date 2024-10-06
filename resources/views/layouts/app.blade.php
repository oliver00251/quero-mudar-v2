<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.7/css/dataTables.dataTables.min.css">

    
<!-- Scripts do Bootstrap -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <title>@yield('title', 'Dashboard')</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/2.1.7/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
    

    <style>
        body {
            display: flex;
            background-color: #f5f5f5;
        }
        .sidebar {
            min-width: 80px;
            background-color: #f8f9fa;
            height: 100vh;
            padding-top: 20px;
        }
        .sidebar .nav-link {
            text-align: center;
            padding: 10px;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
           
        }
        .card-custom {
            border: 1px solid transparent;
            border-radius: 10px;
            padding: 20px;
            position: relative;
            overflow: hidden;
            transition: border-color 0.3s;
        }
        .card-custom:hover {
            border-color: #007bff;
        }
        .card-icon {
            font-size: 2rem;
            position: absolute;
            top: 20px;
            left: 20px;
            color: rgba(0, 0, 0, 0.3);
        }
        .money {
            font-weight: bold;
            font-size: 1.5rem;
        }
        .total-card {
            border-left: 5px solid #007bff;
        }
        .entradas-card {
            border-left: 5px solid #28a745;
        }
        .saidas-card {
            border-left: 5px solid #dc3545;
        }
        /* Estilos da tabela */
        .table {
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
        }
        .table th {
            background-color: #007bff;
            color: white;
        }
        .table td {
            font-weight: 500;
            color: #333;
        }
        .table td.money {
            color: #28a745;
            font-weight: bold;
        }
    </style>
</head>
<body>
   
    @auth
    <div class="sidebar card shadow bg-white">
        @include('partials.sidebar')
    </div>
@endauth


    <div class="content">
        <h1 class="mb-4">@yield('header')</h1>
        @yield('content') <!-- Aqui será inserido o conteúdo das outras páginas -->
    </div>
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.1.7/js/dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


    <script>
function confirmDelete(button) {
    const url = button.getAttribute('data-rota');

    // Verifica se o botão e a URL são válidos
    if (!button || !url) {
        console.error('Button ou URL não encontrado!');
        return;
    }

    Swal.fire({
        title: "Você tem certeza?",
        text: "Este item será permanentemente excluído!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Sim, excluir!",
        cancelButtonText: "Cancelar"
    }).then((result) => {
        if (result.isConfirmed) {
            // Criar o formulário de exclusão dinamicamente
            const form = document.createElement('form');
            form.method = 'POST'; // Para enviar o CSRF
            form.action = url;

            // Obter o token CSRF
            const csrfTokenMeta = document.querySelector('meta[name="csrf-token"]');
            if (!csrfTokenMeta) {
                console.error('Meta tag do CSRF não encontrada!');
                return;
            }
            const csrfToken = csrfTokenMeta.getAttribute('content');

            const inputCsrf = document.createElement('input');
            inputCsrf.type = 'hidden';
            inputCsrf.name = '_token';
            inputCsrf.value = csrfToken;
            form.appendChild(inputCsrf);

            // Adicionar método DELETE
            const inputMethod = document.createElement('input');
            inputMethod.type = 'hidden';
            inputMethod.name = '_method';
            inputMethod.value = 'DELETE'; // Método DELETE
            form.appendChild(inputMethod);

            document.body.appendChild(form);
            form.submit();
        }
    });
}



    </script>
</body>
</html>
