<div class="modal fade" id="modalCategoriaSaida" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalCategoriaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCategoriaLabel">Categoria(Saída)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formCategoria" method="POST" action="{{ route('categorias.store') }}">
                @csrf
                <!-- Campo para o ID, será usado apenas na edição -->
                <input type="hidden" id="categoriaId" name="id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nomeCategoria" class="form-label">Nome</label>
                        <input type="text" class="form-control" placeholder="Nome da categoria..." id="nomeCategoriaDespesa"
                            name="nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="ordemCategoria" class="form-label">Ordem de exibição</label>
                        <input type="number" class="form-control" id="ordemCategoria" name="ordem" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipoCategoria" class="form-label">Tipo</label>
                        <select class="form-select" id="tipoCategoria" name="tipo" required>
                            <option value="">Selecione</option>
                            <option value="despesa" selected>Despesa</option>
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
    // Quando clicar no ícone de edição
    document.querySelectorAll('.fa-edit').forEach(function(editIcon) {
        editIcon.addEventListener('click', function() {
            // Capturar os dados dos atributos data-*
            const id = this.dataset.id;
            const nome = this.dataset.nome;
            const ordem = this.dataset.ordem;
            const tipo = this.dataset.tipo;
            
            // Verifique se os valores foram capturados corretamente
            console.log(`ID: ${id}, Nome: ${nome}, Ordem: ${ordem}, Tipo: ${tipo}`);

            // Preencher os campos do modal com os dados capturados
            document.getElementById('categoriaId').value = id;
            document.getElementById('nomeCategoriaDespesa').value = nome;
            document.getElementById('ordemCategoria').value = ordem;
            document.getElementById('tipoCategoria').value = tipo;

          
        });
    });

    // Função para limpar o modal (caso seja para nova categoria)
    function resetModal() {
        document.getElementById('formCategoria').reset();
        document.getElementById('categoriaId').value = '';
        document.getElementById('formCategoria').action = "{{ route('categorias.store') }}";
    }

    // Quando o modal é fechado, limpar os campos
    document.getElementById('modalCategoriaSaida').addEventListener('hidden.bs.modal', function() {
        resetModal();
    });

    // Quando clicar para adicionar uma nova categoria
    document.querySelector('.fa-plus-circle').addEventListener('click', function() {
        resetModal(); // Limpar o modal para novo cadastro
    });
});

</script>
