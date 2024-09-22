<div class="modal fade" id="modalCategoria" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalCategoriaLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalCategoriaLabel">Categoria</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formCategoria" method="POST" action="{{ route('categorias.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="nomeCategoria" class="form-label">Nome</label>
                        <input type="text" class="form-control" placeholder="Aluguel, Combustível, Pagamento Ajudante..." id="nomeCategoria" name="nome" required>
                    </div>
                    <div class="mb-3">
                        <label for="nomeCategoria" class="form-label">Ordem de exibição</label>
                        <input type="number" class="form-control"  name="ordem" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipoCategoria" class="form-label">Tipo</label>
                        <select class="form-select" id="tipoCategoria" name="tipo" required>
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