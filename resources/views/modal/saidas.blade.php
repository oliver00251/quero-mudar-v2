<div class="modal fade" id="modalSaidas" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalSaidasLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSaidasLabel">Criar Transação (Saída)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="{{ route('pagamentos.store') }}" id="form_saidas" method="POST">
                @csrf
                <input type="hidden" name="id" id="pagamento_id_saida">
                <input type="text" value="D" id="saida_tipo" name="tipo" hidden>
                
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="categoria_saida" class="form-label">Categoria</label>
                        <select class="form-select" id="categoria_saida" name="categoria" required>
                            <option value="">Selecione</option>
                            @foreach ($categoria->where('tipo', 'despesa') as $item)
                                <option value="{{ $item->id }}">{{ $item->nome }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="vlr_transacao_saida" class="form-label">Valor</label>
                        <input type="number" class="form-control" id="vlr_transacao_saida" name="vlr_transacao" step="0.01" min="0" required>
                    </div>

                    <div class="mb-3">
                        <label for="dt_ref_saida" class="form-label">Data Referência</label>
                        <input type="date" class="form-control" id="dt_ref_saida" name="dt_ref" required>
                    </div>

                    <div class="mb-3">
                        <label for="veiculo" class="form-label">Veículo</label>
                        <select class="form-select" id="veiculo" name="veiculo" >
                            <option value="">Selecione</option>
                            @foreach ($veiculos as $item)
                                <option value="{{ $item->modelo }}">{{ $item->modelo }}</option>
                            @endforeach
                        </select>
                    </div>

                  {{--   <div class="mb-3">
                        <label for="qtd_ajudante_saida" class="form-label">Quantidade Ajudante</label>
                        <input type="number" class="form-control" id="qtd_ajudante_saida" name="qtd_ajudante" placeholder="Digite a quantidade de ajudantes">
                    </div>
 --}}
                    <div class="mb-3">
                        <label for="qtd_horas_saida" class="form-label">Quantidade de Horas</label>
                        <input type="number" class="form-control" id="qtd_horas_saida" name="qtd_horas" placeholder="Digite a quantidade de horas">
                    </div>

                    <div class="mb-3">
                        <label for="vlr_hora_saida" class="form-label">Valor Hora</label>
                        <input type="number" class="form-control" id="vlr_hora_saida" name="vlr_hora" placeholder="Digite o valor por hora">
                    </div>

                    <div class="mb-3">
                        <label for="descricao_saida" class="form-label">Observação (Opcional)</label>
                        <input type="text" class="form-control" id="descricao_saida" name="descricao" placeholder="Digite alguma observação ou descrição">
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

<script>
    $(document).ready(function() {
        // Ao clicar no ícone de adicionar saída
        $('.registro_despesa').on('click', function() {
            var categoriaId = $(this).data('id');
            $('#saida_tipo').val('D')
            // Abre o modal de saídas e preenche a categoria
            $('#modalSaidas').modal('show');
            $('#modalSaidas select[name="categoria"]').val(categoriaId);
        });

        // Script para edição das saídas
        $('.editar_lancamento').on('click', function() {
            const dadosPagamento = JSON.parse($(this).attr('data-dados'));


            // Preencher campos no modal de saídas
            $('#saida_tipo').val('D')
            $('#pagamento_id_saida').val(dadosPagamento.id || '');
            $('#modalSaidas input[name="vlr_transacao"]').val(dadosPagamento.valor || '');
            $('#modalSaidas input[name="dt_ref"]').val(dadosPagamento.data || '');
            $('#veiculo_saida').val(dadosPagamento.veiculo || '');
            $('#qtd_ajudante_saida').val(dadosPagamento.qtd_ajudante || '');
            $('#qtd_horas_saida').val(dadosPagamento.qtd_horas || '');
            $('#vlr_hora_saida').val(dadosPagamento.vlr_hora || '');
            $('#descricao_saida').val(dadosPagamento.descricao || '');

            // Preencher categoria corretamente
            $('#categoria_saida').val(dadosPagamento.categoria_id || '');
        });
         // Resetar os inputs ao fechar o modal
        $('#modalSaidas').on('hidden.bs.modal', function () {
            $(this).find('input, select').val('');
            $(this).find('input[type="hidden"]').val(''); // Limpa o campo oculto do ID
        });

    });
</script>
