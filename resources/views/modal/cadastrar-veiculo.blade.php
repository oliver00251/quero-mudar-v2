<div class="modal fade" id="modalCadastrarVeiculo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="modalVeiculoLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
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
        </div>
    </div>
</div>

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
