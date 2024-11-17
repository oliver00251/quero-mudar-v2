<div class="modal fade" id="modalCadastrarVeiculo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalVeiculoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content" id="modal_cad_veiculos">
            <div class="modal-header">
                <h5 class="modal-title" id="modalVeiculoLabel">Cadastrar Veículo</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="formVeiculo" method="POST" action="{{ route('veiculos.store') }}">
                @csrf
                <!-- Campo para o ID, será usado apenas na edição -->
                <input type="hidden" id="veiculoId" name="id">
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="placaVeiculo" class="form-label">Placa</label>
                        <input type="text" class="form-control" placeholder="Placa do veículo..." id="placaVeiculo"
                            name="placa" required>
                    </div>
                    <div class="mb-3">
                        <label for="modeloVeiculo" class="form-label">Marca/Modelo</label>
                        <input type="text" class="form-control" placeholder="Marca e Modelo  do veículo..." id="modeloVeiculo"
                            name="modelo" required>
                    </div>
                    <div class="mb-3">
                        <label for="tipoVeiculo" class="form-label">Tipo</label>
                        <select class="form-select" id="tipoVeiculo" name="tipo" required>
                            <option value="">Selecione</option>
                            <option value="caminhão" selected>Caminhão</option>
                            <option value="carro">Carro</option>
                            <option value="moto">Moto</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </form>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Modelo</th>
                        <th class="table_acoes_vei">Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($veiculos as $item)
                        <tr>
                            <td>{{ $item->modelo }}</td>
                            <td class="table_acoes_vei">
                                <!-- Botão para Editar -->
                              {{--   <a href="{{ route('veiculos.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-pencil-alt"></i> Editar
                                </a> --}}
            
                                <!-- Botão para Excluir -->
                                <form action="{{ route('veiculos.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir este veículo?')">
                                        <i class="fa fa-trash"></i> Excluir
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
        </div>
        
    </div>
</div>
<style>
   .table_acoes_vei {
    text-align: right;
}
</style>
<script>
 document.addEventListener('DOMContentLoaded', function() {
    // Quando clicar no ícone de edição
    document.querySelectorAll('.fa-edit').forEach(function(editIcon) {
        editIcon.addEventListener('click', function() {
            // Capturar os dados dos atributos data-*
            const id = this.dataset.id;
            const placa = this.dataset.placa;
            const modelo = this.dataset.modelo;
            const tipo = this.dataset.tipo;
            
            // Verifique se os valores foram capturados corretamente
            console.log(`ID: ${id}, Placa: ${placa}, Modelo: ${modelo}, Tipo: ${tipo}`);

            // Preencher os campos do modal com os dados capturados
            document.getElementById('veiculoId').value = id;
            document.getElementById('placaVeiculo').value = placa;
            document.getElementById('modeloVeiculo').value = modelo;
            document.getElementById('tipoVeiculo').value = tipo;

          
        });
    });

    // Função para limpar o modal (caso seja para novo veículo)
    function resetModal() {
        document.getElementById('formVeiculo').reset();
        document.getElementById('veiculoId').value = '';
        document.getElementById('formVeiculo').action = "{{ route('veiculos.store') }}";
    }

    // Quando o modal é fechado, limpar os campos
    document.getElementById('modalCadastrarVeiculo').addEventListener('hidden.bs.modal', function() {
        resetModal();
    });

    // Quando clicar para adicionar um novo veículo
    document.querySelector('.fa-plus-circle').addEventListener('click', function() {
        resetModal(); // Limpar o modal para novo cadastro
    });
});
</script>
