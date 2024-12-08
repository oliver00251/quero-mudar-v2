<div class="navbar-brand d-flex justify-content-center">
    <img src="{{ asset('img/logo.jpeg') }}" alt="Logo" style="
    width: 61px;
    border-radius: 100%;
    margin-right: -1rem;
    ">
</div>

<ul class="nav flex-column">
    <li class="nav-item" title="Filtrar Periodo">
        <a class="nav-link" href="#" id="toggleCollapse">
            <i class="fas fa-calendar-alt"></i>
        </a>
    </li>
    <li class="nav-item" id="toggleButton" title="Gerenciar Balanço">
        <a class="nav-link" href="#">
            <i class="fas fa-chart-line"></i>
        </a>
    </li>
    <li class="nav-item" id="clientes_demandas" title="Gerenciar Clientes">
        <a class="nav-link" href="#">
            <i class="fas fa-users"></i>
        </a>
    </li>
    <li class="nav-item" id="toggleButtonDetalhamento" title="Gerenciar Detalhamento">
        <a class="nav-link" href="#">
            <i class="fas fa-list"></i>
        </a>
    </li>
   <!-- Item que representa Caminhão -->
    <li class="nav-item" title="Gerenciar Veículos" data-bs-toggle="modal" data-bs-target="#modalCadastrarVeiculo"> 
        <a class="nav-link" href="#" >
            <i class="fas fa-truck"></i>
        </a>
    </li>
   
    <li class="nav-item" title="Adicionar Entrada" data-bs-toggle="modal" > 
        <a class="nav-link" href="#" >
            <i class="fa fa-plus-circle fa-plus-circle-entrada"></i>
        </a>
    </li>
    <li class="nav-item" title="Adicionar Saída" data-bs-toggle="modal" data-bs-target="#modalSaidas"> 
        <a class="nav-link" href="#" >
            <i class=" fa fa-plus-circle fas fa-arrow-down text-danger"></i>
        </a>
    </li>
    <li class="nav-item toggleButtonGerenciar"  title="Gerenciar Entrada e Saída" > 
        <a class="nav-link" href="#" >
            <i class=" fas fa-cogs"></i>
        </a>
    </li>
    

</ul>

<style>
    #collapseExample {
        display: none; /* Ocultar inicialmente */
    }
</style>
<script>
    document.getElementById('toggleCollapse').addEventListener('click', function(e) {
        e.preventDefault(); // Evita o comportamento padrão do link

        const content = document.getElementById('collapseExample');
        // Alterna a visibilidade do conteúdo
        if (content.style.display === 'none' || content.style.display === '') {
            content.style.display = 'block';
        } else {
            content.style.display = 'none';
        }
    });
    document.querySelectorAll('.toggleButtonGerenciar').forEach((button) => {
    button.addEventListener('click', function () {
        console.log('Botão clicado!');  // Verifica se o evento está sendo disparado
        
        const content = document.querySelector('.toggleContent');
        const content2 = document.querySelector('.toggleContent2');

        // Alterna a visibilidade de 'content'
        if (content) {
            if (content.style.display === 'none' || content.style.display === '') {
                content.style.display = 'block';
            } else {
                content.style.display = 'none';
            }
        }

        // Alterna a visibilidade de 'content2'
        if (content2) {
            if (content2.style.display === 'none' || content2.style.display === '') {
                content2.style.display = 'block';
            } else {
                content2.style.display = 'none';
            }
        }
    });
});


</script>
