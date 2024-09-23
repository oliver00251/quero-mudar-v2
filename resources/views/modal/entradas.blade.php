<div class="modal fade" id="modalEntradas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalEntradasLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalEntradasLabel">Criar Transação(Entrada)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pagamentos.store') }}" id="form_entradas" method="POST">
                @csrf
                <!-- Campo oculto para o ID -->
                <input type="hidden" name="id" id="pagamento_id">
                
                <div class="modal-body">
                    <input type="text" value="R" name="tipo" hidden>
                    
                    <div class="mb-3">
                        <label for="categoria" class="form-label">Categoria</label>
                        <select class="form-select" id="categoria" name="categoria" required>
                            <option value="">Selecione</option>
                            @foreach ($categoria->where('tipo', 'receita') as $item)
                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
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
                        <label for="veiculo" class="form-label">Veículo</label>
                        <input type="text" class="form-control" id="veiculo" name="veiculo" placeholder="Digite o modelo do veículo">
                    </div>

                    <div class="mb-3">
                        <label for="qtd_ajudante" class="form-label">Quantidade Ajudante</label>
                        <input type="number" class="form-control" id="qtd_ajudante" name="qtd_ajudante" placeholder="Digite a quantidade de ajudantes">
                    </div>

                    <div class="mb-3">
                        <label for="qtd_horas" class="form-label">Quantidade de Horas</label>
                        <input type="number" class="form-control" id="qtd_horas" name="qtd_horas" placeholder="Digite a quantidade de horas">
                    </div>

                    <div class="mb-3">
                        <label for="vlr_hora" class="form-label">Valor Hora</label>
                        <input type="number" class="form-control" id="vlr_hora" name="vlr_hora" placeholder="Digite o valor por hora">
                    </div>

                    <div class="mb-3">
                        <label for="descricao" class="form-label">Observação (Opcional)</label>
                        <input type="text" class="form-control" id="descricao" name="descricao" placeholder="Digite alguma observação ou descrição">
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

<!-- Script -->
<script>
    $(document).ready(function() {
        // Ao clicar no ícone de adicionar entrada
        $('.fa-plus-circle-entrada').on('click', function() {
            document.getElementById('form_entradas').reset();

            // Pegar o ID da categoria a partir do ícone clicado
            var categoriaId = $(this).data('id');
            
            // Abrir o modal e selecionar a categoria com base no ID
            $('#modalEntradas').modal('show'); // Abre o modal
            $('#modalEntradas select[name="categoria"]').val(categoriaId); // Preenche o campo com o ID da categoria
        });
    });

    document.addEventListener('DOMContentLoaded', function () {
        const editButtons = document.querySelectorAll('.editar_lancamento');

        editButtons.forEach(button => {
            button.addEventListener('click', function () {
                // Captura os dados do atributo data-dados
                const dadosPagamento = JSON.parse(this.getAttribute('data-dados'));

                // Preenche os campos no modal
                $('#modalEntradas input[name="vlr_transacao"]').val(dadosPagamento.valor || '');
                $('#modalEntradas input[name="dt_ref"]').val(dadosPagamento.data || '');
                $('#modalEntradas input[name="veiculo"]').val(dadosPagamento.veiculo || '');
                $('#modalEntradas input[name="qtd_ajudante"]').val(dadosPagamento.qtd_ajudante || '');
                $('#modalEntradas input[name="qtd_horas"]').val(dadosPagamento.qtd_horas || '');
                $('#modalEntradas input[name="vlr_hora"]').val(dadosPagamento.vlr_hora || '');
                $('#modalEntradas input[name="descricao"]').val(dadosPagamento.descricao || '');

                // Para selecionar a categoria usando o atributo name
                const categoriaId = dadosPagamento.categoria_id;
                if (categoriaId) {
                    $('#modalEntradas select[name="categoria"]').val(categoriaId);
                }

                // Preencher o campo hidden do ID
                $('#pagamento_id').val(dadosPagamento.id || '');
            });
        });
    });
    // Resetar os inputs ao fechar o modal
    $('#modalEntradas').on('hidden.bs.modal', function () {
    // Reseta o formulário
    document.getElementById('form_entradas').reset();
});
</script>
