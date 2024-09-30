<!-- Modal para Cadastro de Clientes -->
<div class="modal fade" id="modalEntradas3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEntradasLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl"> <!-- Alterado para modal-xl para mais largura -->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEntradasLabel">Cadastro Morada e Cliente</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('clientes.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <!-- Primeira coluna (formulário 1) -->
                        <div class="col-md-6">
                            <h6>Dados do Cliente</h6>
                            <div class="form-group">
                                <label for="data">Data</label>
                                <input type="date" class="form-control" id="data" name="data" required>
                            </div>
                            <div class="form-group">
                                <label for="nomeCliente">Nome</label>
                                <input type="text" class="form-control" id="nomeCliente" name="nomeCliente" required>
                            </div>
                            <div class="form-group">
                                <label for="telefoneCliente">Telefone</label>
                                <input type="tel" class="form-control" id="telefoneCliente" name="telefoneCliente">
                            </div>
                            <div class="form-group">
                                <label for="emailCliente">Email</label>
                                <input type="email" class="form-control" id="emailCliente" name="emailCliente">
                            </div>
                        </div>
                        <!-- Segunda coluna (formulário 2) -->
                        <div class="col-md-6">
                            <h6>Dados da Morada</h6>
                            <div class="form-group">
                                <label for="tipoEndereco">Tipo de Endereço</label>
                                <select class="form-control" id="tipoEndereco" name="tipoEndereco" required>
                                    <option value="">Selecione</option>
                                    <option value="carga">Carga</option>
                                    <option value="descarga">Descarga</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="rua">Rua</label>
                                <input type="text" class="form-control" id="rua" name="rua" required>
                            </div>
                            <div class="form-group">
                                <label for="cidade">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" required>
                            </div>
                            <div class="form-group">
                                <label for="regiao">Região</label>
                                <input type="text" class="form-control" id="regiao" name="regiao">
                            </div>
                            <div class="form-group">
                                <label for="codigoPostal">Código Postal</label>
                                <input type="text" class="form-control" id="codigoPostal" name="codigoPostal">
                            </div>
                            <div class="form-group">
                                <label for="pais">País</label>
                                <input type="text" class="form-control" id="pais" name="pais" value="Portugal" required>
                            </div>
                            <div class="form-group">
                                <label for="complemento">Complemento</label>
                                <input type="text" class="form-control" id="complemento" name="complemento">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>
