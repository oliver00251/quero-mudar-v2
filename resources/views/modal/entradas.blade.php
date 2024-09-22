<div class="modal fade" id="modalEntradas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEntradasLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="modalEntradasLabel">Criar Transação</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('pagamentos.store') }}" method="POST">
          @csrf
          <div class="modal-body">
            <input type="text" value="R" name="tipo" hidden>
            <div class="mb-3">
              <label for="categoria" class="form-label">Categoria</label>
              <select class="form-select" id="categoria" name="categoria" required>
                <option value="">Selecione</option>
                @foreach ($categoria->where('tipo', 'receita') as $item)
                <option value="{{$item->id}}">{{$item->nome}}</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="vlr_transacao" class="form-label">Valor</label>
              <input type="number" class="form-control" id="vlr_transacao" name="vlr_transacao" step="0.01" min="0" required>
            </div>
            <div class="mb-3">
              <label for="dt_ref" class="form-label">Data Referência</label>
              <input type="date" class="form-control" id="dt_ref" name="dt_ref" required>
            </div>
            <div class="mb-3">
              <label for="descricao" class="form-label">Observação(Opcional)</label>
              <input type="text" class="form-control" value="-" id="descricao" placeholder="Digite alguma descrição do que será pago" name="descricao">
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