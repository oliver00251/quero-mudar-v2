<!-- Modal Cadastro de Clientes -->
<div class="modal fade" id="modalAddmorada" tabindex="-1" role="dialog" aria-labelledby="modalAddmoradaLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddmoradaLabel">Cadastro Morada</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('clientes.store.morada') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-row">
                     <input type="text" class="id_morada" value="" name="id_morada" hidden>
                     <div class="form-group col-md-6">
                        <label for="tipoEndereco">Tipo de Endereço</label>
                        <select class="form-control" id="tipoEndereco" name="tipoEndereco" required>
                            <option value="">Selecione</option>
                            <option value="carga">Carga</option>
                            <option value="descarga">Descarga</option>
                        </select>
                    </div>
                        <div class="form-group col-md-6">
                            <label for="rua">Rua</label>
                            <input type="text" class="form-control" id="rua" name="rua" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="regiao">Região</label>
                            <input type="text" class="form-control" id="regiao" name="regiao" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="codigoPostal">Código Postal</label>
                            <input type="text" class="form-control" id="codigoPostal" name="codigoPostal" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="pais">País</label>
                            <input type="text" class="form-control" id="pais" name="pais" value="Portugal" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="complemento">Complemento</label>
                        <input type="text" class="form-control" id="complemento" name="complemento">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
        </div>
    </div>
</div>

