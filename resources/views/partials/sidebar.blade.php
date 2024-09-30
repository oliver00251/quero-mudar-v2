<div class="navbar-brand d-flex justify-content-center">
    <img src="{{ asset('img/logo.jpeg') }}" alt="Logo" style="
    width: 61px;
    border-radius: 100%;
    margin-right: -1rem;
    "

    >
</div>

<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link" href="#" id="toggleCollapse">
            <i class="fas fa-calendar-alt"></i>
        </a>
    </li>
    <li class="nav-item" id="toggleButton">
        <a class="nav-link" href="#">
            <i class="fas fa-chart-line"></i>
        </a>
    </li>
    <li class="nav-item" id="clientes_demandas">
        <a class="nav-link" href="#">
            <i class="fas fa-users"></i>
        </a>
    </li>
    <li class="nav-item" id="toggleButtonDetalhamento">
        <a class="nav-link" href="#">
            <i class="fas fa-list"></i>
        </a>
    </li>
   
    <li class="nav-item"  data-bs-toggle="modal" data-bs-target="#lancamentoModal">
        <a class="nav-link" href="#">
            <i class="fas fa-user"></i>
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
</script>