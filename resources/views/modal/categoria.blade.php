<div class="modal fade" id="modalCategoriaEntrada" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalCategoriaEntradaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCategoriaEntradaLabel">Categoria(Entrada)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formCategoriaEntrada" method="POST" action="{{ route('categorias.store') }}">
                @csrf
                <!-- Campo para o ID, será usado apenas na edição -->
                <input type="hidden" id="categoriaIdEntrada" name="id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nomeCategoriaEntrada" class="form-label">Nome</label>
                        <input type="text" class="form-control" placeholder="Nome da categoria..." id="nomeCategoriaEntrada" name="nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="ordemCategoriaEntrada" class="form-label">Ordem de exibição</label>
                        <input type="number" class="form-control" id="ordemCategoriaEntrada" name="ordem" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipoCategoriaEntrada" class="form-label">Tipo</label>
                        <select class="form-select" id="tipoCategoriaEntrada" name="tipo" required>
                            <option value="">Selecione</option>
                            <option value="receita" selected>Receita</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
    // Quando clicar no ícone de edição para categorias de Entrada
    document.querySelectorAll('.fa-edit-entrada').forEach(function(editIcon) {
        editIcon.addEventListener('click', function() {
            // Capturar os dados dos atributos data-*
            const id = this.dataset.id;
            const nome = this.dataset.nome;
            const ordem = this.dataset.ordem;
            const tipo = this.dataset.tipo;
            
            // Preencher os campos do modal com os dados capturados
            document.getElementById('categoriaIdEntrada').value = id;
            document.getElementById('nomeCategoriaEntrada').value = nome;
            document.getElementById('ordemCategoriaEntrada').value = ordem;
            document.getElementById('tipoCategoriaEntrada').value = tipo;

           
        });
    });

    // Função para limpar o modal de Entrada
    function resetModalEntrada() {
        document.getElementById('formCategoriaEntrada').reset();
        document.getElementById('categoriaIdEntrada').value = '';
        document.getElementById('formCategoriaEntrada').action = "{{ route('categorias.store') }}";
    }

    // Quando o modal de entrada é fechado, limpar os campos
    document.getElementById('modalCategoriaEntrada').addEventListener('hidden.bs.modal', function() {
        resetModalEntrada();
    });

    // Quando clicar para adicionar uma nova categoria de Entrada
    document.querySelector('.fa-plus-circle-entrada').addEventListener('click', function() {
        resetModalEntrada(); // Limpar o modal para novo cadastro
    });
});

</script>