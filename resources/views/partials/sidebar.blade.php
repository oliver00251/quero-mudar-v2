<div class="navbar-brand text-center">Logo</div>
<ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link" href="#" id="toggleCollapse">
            <i class="fas fa-calendar-alt"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-chart-line"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-info-circle"></i>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-users"></i>
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