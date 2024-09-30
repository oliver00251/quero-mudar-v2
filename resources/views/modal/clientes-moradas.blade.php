


<div class="modal fade" id="modalEntradas2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEntradasLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEntradasLabel">Cadastro Morada</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('clientes.store.morada') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <input type="hidden" class="id_morada" name="id_morada">
            
                        <!-- Tipo de Endereço -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="tipoEndereco" class="form-label">Tipo de Endereço</label>
                                <select class="form-control" id="tipoEndereco" name="tipoEndereco" required>
                                    <option value="">Selecione</option>
                                    <option value="carga">Carga</option>
                                    <option value="descarga">Descarga</option>
                                </select>
                            </div>
                        </div>
            
                        <!-- Rua -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="rua" class="form-label">Rua</label>
                                <input type="text" class="form-control" id="rua" name="rua" required>
                            </div>
                        </div>
                    </div>
            
                    <div class="row">
                        <!-- Cidade -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="cidade" class="form-label">Cidade</label>
                                <input type="text" class="form-control" id="cidade" name="cidade" required>
                            </div>
                        </div>
            
                        <!-- Região -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="regiao" class="form-label">Região</label>
                                <input type="text" class="form-control" id="regiao" name="regiao">
                            </div>
                        </div>
                    </div>
            
                    <div class="row">
                        <!-- Código Postal -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="codigoPostal" class="form-label">Código Postal</label>
                                <input type="text" class="form-control" id="codigoPostal" name="codigoPostal">
                            </div>
                        </div>
            
                        <!-- País -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="pais" class="form-label">País</label>
                                <input type="text" class="form-control" id="pais" name="pais" value="Portugal" required>
                            </div>
                        </div>
                    </div>
            
                    <!-- Complemento -->
                    <div class="mb-3">
                        <label for="complemento" class="form-label">Complemento</label>
                        <input type="text" class="form-control" id="complemento" name="complemento">
                    </div>
            
                    <!-- Campo faltante: Número do Endereço -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="numero" class="form-label">Número</label>
                                <input type="text" class="form-control" id="numero" name="numero" required>
                            </div>
                        </div>
            
                        <!-- Campo faltante: Bairro -->
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="bairro" class="form-label">Bairro</label>
                                <input type="text" class="form-control" id="bairro" name="bairro" required>
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





