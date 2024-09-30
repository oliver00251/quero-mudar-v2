<div class="card shadow" style="z-index: 2;">
    <div class="card-header py-3">
        <h4 class="font-weight-bold text-center mb-1 titulo_lancamentos">Clientes</h4>
        <!-- Botão para abrir o modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalEntradas3">
    Cadastrar Cliente
</button>

    </div>
    <div class="card-body tabela_valores">
        <div class="table-responsive" style="width: 100%;">
            <table class="table table-bordered dataTable" id="dataTableClientes" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info">
                <thead>
                    <tr role="row">
                        <th>Data</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Tipo</th>
                        <th>Rua</th>
                        <th>Cidade</th>
                        <th>Região</th>
                        <th>Código Postal</th>
                        <th>País</th>
                        <th>Complemento</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clientes as $cliente)
                    <tr>
                        <td>{{ \Carbon\Carbon::parse($cliente->data)->format('d/m/Y') }}</td>
                        <td>{{ $cliente->nome_cliente }}</td>
                        <td>{{ $cliente->telefone }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->enderecos->first()->tipo }}</td>
                        <td>{{ $cliente->enderecos->first()->rua }}</td>
                        <td>{{ $cliente->enderecos->first()->cidade }}</td>
                        <td>{{ $cliente->enderecos->first()->regiao }}</td>
                        <td>{{ $cliente->enderecos->first()->codigo_postal }}</td>
                        <td>{{ $cliente->enderecos->first()->pais }}</td>
                        <td>{{ $cliente->enderecos->first()->complemento }}</td>
                        <td>
                            <i class="fa fa-edit" 
                               data-id="{{ $cliente->id }}" 
                               data-nome="{{ $cliente->nome_cliente }}"
                               title="Editar" 
                               onclick="openUpdateModal(this)" style="cursor:pointer"></i>
                            <i class="fa fa-plus-circle" 
                               data-id="{{ $cliente->id }}" 
                               title="Adicionar Morada" 
                               onclick="addMorada(this)" style="cursor:pointer"></i>
                            <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                            </form>
                            @if($cliente->enderecos->count() > 1)
                                <i class="fa fa-eye" 
                                   data-id="{{ $cliente->id }}" 
                                   title="Ver endereços secundários" 
                                   onclick="toggleEnderecos(this)" style="cursor:pointer"></i>
                            @endif
                        </td>
                    </tr>
                    <!-- Endereços secundários -->
                    @if($cliente->enderecos->count() > 1)
                    <tr class="enderecos-secundarios" id="enderecos{{ $cliente->id }}" style="display: none;">
                        <td colspan="12" class="td_principal">
                            <ul class="list-group" style="margin-top: 10px; display: block;">
                                @foreach ($cliente->enderecos->skip(1) as $endereco) <!-- Loop pelos endereços secundários -->
                                    <li class="list-group-item">
                                        <strong>Tipo:</strong> {{ $endereco->tipo }}<br>
                                        <strong>Rua:</strong> {{ $endereco->rua }}<br>
                                        <strong>Cidade:</strong> {{ $endereco->cidade }}<br>
                                        <strong>Região:</strong> {{ $endereco->regiao }}<br>
                                        <strong>Código Postal:</strong> {{ $endereco->codigo_postal }}<br>
                                        <strong>País:</strong> {{ $endereco->pais }}<br>
                                        <strong>Complemento:</strong> {{ $endereco->complemento }}<br>
                                        <div class="float-end">
                                            <i class="fa fa-edit" 
                                               data-id="{{ $endereco->id }}" 
                                               title="Editar Endereço" 
                                               onclick="openUpdateAddressModal(this)" style="cursor:pointer"></i>
                                            <form action="{{ route('enderecos.destroy', $endereco->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                            </form>
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    @endif
                    
                    @endforeach
                </tbody>
            </table>
            
        </div>
    </div>
    
    <script>
        function toggleEnderecos(icon) {
            const clienteId = icon.getAttribute('data-id');
            const enderecosRow = document.getElementById(`enderecos${clienteId}`);
    
            if (enderecosRow.style.display === "none") {
                enderecosRow.style.display = "table-row"; // Mostra os endereços
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash"); // Muda o ícone para 'ocultar'
            } else {
                enderecosRow.style.display = "none"; // Esconde os endereços
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye"); // Muda o ícone para 'mostrar'
            }
        }
    </script>
    
    
    
    
</div>

<!-- Modal para Atualizar Cliente -->
<div class="modal fade" id="modalUpdateCliente" tabindex="-1" role="dialog" aria-labelledby="modalUpdateClienteLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalUpdateClienteLabel">Atualizar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="updateForm" action="" method="POST">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="updateNomeCliente">Nome</label>
                            <input type="text" class="form-control" id="updateNomeCliente" name="nomeCliente" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="updateTelefoneCliente">Telefone</label>
                            <input type="tel" class="form-control" id="updateTelefoneCliente" name="telefoneCliente" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="updateEmailCliente">Email</label>
                            <input type="email" class="form-control" id="updateEmailCliente" name="emailCliente" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="updateRua">Rua</label>
                            <input type="text" class="form-control" id="updateRua" name="rua" required>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="updateCidade">Cidade</label>
                            <input type="text" class="form-control" id="updateCidade" name="cidade" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="updateRegiao">Região</label>
                            <input type="text" class="form-control" id="updateRegiao" name="regiao" >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="updateCodigoPostal">Código Postal</label>
                            <input type="text" class="form-control" id="updateCodigoPostal" name="codigoPostal" >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="updatePais">País</label>
                            <input type="text" class="form-control" id="updatePais" name="pais" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="updateComplemento">Complemento</label>
                        <input type="text" class="form-control" id="updateComplemento" name="complemento">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Atualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .table-responsive {
    overflow-x: auto;
}

.table td {
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    max-width: 200px; /* Define um tamanho máximo para as colunas */
}

.collapse td {
    white-space: normal;
}

</style>
<script>
  

    function addMorada(element) {
    var id = $(element).data('id'); // Obtém o data-id do ícone
    console.log('ID capturado:', id); // Verifica se o ID está sendo capturado

    var modal = $('#modalEntradas2'); // Obtém o modal
    var form = modal.find('form'); // Encontra o formulário no modal
    form.find('input[name="id_morada"]').val(id); // Preenche o input com o id
    
    modal.modal('show'); // Exibe o modal
}
function openUpdateModal(element) {
    var id = element.getAttribute('data-id');
    var nome = element.getAttribute('data-nome');
    var telefone = element.getAttribute('data-telefone');
    var email = element.getAttribute('data-email');
    var rua = element.getAttribute('data-rua');
    var cidade = element.getAttribute('data-cidade');
    var regiao = element.getAttribute('data-regiao');
    var codigo_postal = element.getAttribute('data-codigo_postal');
    var pais = element.getAttribute('data-pais');
    var complemento = element.getAttribute('data-complemento');

    var modal = $('#modalUpdateCliente');
    var form = modal.find('form');
    form.attr('action', '/clientes/' + id);
    form.find('input[name="nomeCliente"]').val(nome);
    form.find('input[name="telefoneCliente"]').val(telefone);
    form.find('input[name="emailCliente"]').val(email);
    form.find('input[name="rua"]').val(rua);
    form.find('input[name="cidade"]').val(cidade);
    form.find('input[name="regiao"]').val(regiao);
    form.find('input[name="codigoPostal"]').val(codigo_postal);
    form.find('input[name="pais"]').val(pais);
    form.find('input[name="complemento"]').val(complemento);

    modal.modal('show');
}

// Função para remover células vazias das linhas com a classe "enderecos-secundarios"
function removeEmptyCells() {
    // Seleciona todas as linhas que têm a classe "enderecos-secundarios"
    const enderecosRows = document.querySelectorAll('.enderecos-secundarios');

    enderecosRows.forEach(row => {
        // Seleciona todas as células da linha atual
        const cells = row.querySelectorAll('td');

        cells.forEach(cell => {
            // Verifica se a célula está vazia (ou seja, não contém texto ou HTML)
            if (cell.innerHTML.trim() === '') {
                // Remove a célula do DOM
                cell.remove();
            }
        });
    });
}

// Chama a função quando a página carrega
document.addEventListener('DOMContentLoaded', removeEmptyCells);


</script>

