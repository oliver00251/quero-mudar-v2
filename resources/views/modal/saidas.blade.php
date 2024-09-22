<!-- Modal Saídas -->
<div class="modal fade" id="modalSaidas" tabindex="-1" role="dialog" aria-labelledby="modalSaidasLabel" aria-hidden="true">
    <!-- Modal para Criar Transação -->
     <div class="modal-dialog" role="document">
         <div class="modal-content">
             <div class="modal-header">
                 <h5 class="modal-title" id="modalCreateTransacaoLabel">Criar Transação</h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                 </button>
             </div>
             <form action="{{ route('pagamentos.store') }}" method="POST">
                @csrf
                <div class="modal-body">
                    <input type="text" value="D" name="tipo" hidden>
                    <div class="form-group">
                        <label for="tipoCategoria">Categoria</label>
                        <select class="form-control" id="categoria" name="categoria" required>
                            <option value="">Selecione</option>
                            @foreach ( $categoria->where('tipo','despesa') as  $item)
                            <option value="{{$item->id}}" {{$item->nome}}>{{$item->nome}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="transacao_nome">Valor</label>
                        <input type="number" class="form-control" id="vlr_transacao" name="vlr_transacao" step="0.01" min="0" required>
                    </div>
                    <div class="form-group">
                        <label for="transacao_nome">Data Referência</label>
                        <input type="date" class="form-control" id="dt_ref" name="dt_ref" required>
                    </div>
                    <div class="form-group">
                        <label for="descricao">Observação(Opcional)</label>
                        <input type="text" value="-" class="form-control" id="descricao" placeholder="Digite alguma descrição do que será pago" name="descricao" required>
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

