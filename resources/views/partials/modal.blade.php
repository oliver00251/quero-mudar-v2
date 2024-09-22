<!-- Full screen modal -->
<div class="modal fade" id="lancamentoModal" tabindex="-1" aria-labelledby="lancamentoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-fullscreen">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="lancamentoModalLabel">Adicionar Lançamento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-4">
                        <ul class="list-group">
                            <li class="list-group-item active" aria-current="true">Entradas</li>
                            <li class="list-group-item">Viagem</li>
                            <li class="list-group-item">Trabalho</li>
                            <li class="list-group-item">Alimentação</li>
                            <li class="list-group-item">Saúde</li>
                            <!-- Adicione mais categorias conforme necessário -->
                        </ul>
                    </div>
                    <div class="col-md-8">
                        <div class="card">
                            <div class="card-header bg-info" >
                                <h6>Cadastrar Categoria</h6>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="mb-3">
                                        <label for="tipo" class="form-label">Tipo</label>
                                        <select class="form-select" id="tipo">
                                            <option value="receita">Receita</option>
                                            <option value="despesa">Despesa</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <label for="descricao" class="form-label">Descrição</label>
                                        <input type="text" class="form-control" id="descricao" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="categoria" class="form-label">Categoria</label>
                                        <input type="text" class="form-control" id="categoria" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="valor" class="form-label">Valor</label>
                                        <input type="number" class="form-control" id="valor" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="dataReferencia" class="form-label">Data Referência</label>
                                        <input type="date" class="form-control" id="dataReferencia" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="dataLancamento" class="form-label">Data Lançamento</label>
                                        <input type="date" class="form-control" id="dataLancamento" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Salvar</button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>

