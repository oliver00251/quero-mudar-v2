<div class="row mb-4">
    <div class="col-md-2 toggleContent" style="display: none">
        <ul class="list-group">
            <li class="list-group-item active d-flex justify-content-between" data-bs-toggle="modal" data-bs-target="#modalCategoriaEntrada">
                <span>Entradas</span>
                <span>
                    <i class="{{-- fa fa-plus-circle fa-plus-circle-entrada --}}" 
                       style="cursor: pointer;" 
                     {{--   data-bs-toggle="modal"  --}}
                  {{--      data-bs-target="#modalCategoriaEntrada"  --}}
                       title="Adicionar Entrada">+</i>
                </span>
            </li>
            
            @foreach($categoria->where('tipo','receita') as $cat)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <small>
                        {{$cat->ordem}}°-
                        {{ $cat->nome }}
                </small>
                <span>
                    <!-- Ícone de edição, com os atributos data-* para passar os dados para o modal -->
                    <i class="fas fa-edit fa-edit-entrada" data-id="{{ $cat->id }}" data-nome="{{ $cat->nome }}" data-ordem="{{ $cat->ordem }}" data-tipo="{{ $cat->tipo }}" aria-hidden="true" style="cursor: pointer;" data-bs-toggle="modal" data-bs-target="#modalCategoriaEntrada"></i>
                    {{-- Ícone para adicionar entradadas --}}
                    <i class="fa fa-plus-circle fa-plus-circle-entrada registro_fin" 
                    style="cursor: pointer;" 
                    data-bs-toggle="modal" 
                    data-bs-target="#modalEntradas" 
                    data-id={{$cat->id}}
                    title="Adicionar Entrada"></i>
                </span>
            </li>
            @endforeach
        </ul>
    </div>
    

    <div class="col-md">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Lançamentos</h5>
                <div>
                    <strong>Tipo R = Receita</strong><br>
                    <strong>Tipo D = Despesa</strong>
                </div>
            </div>
            <div class="card-body">
                <table id="lancamentosTable" class="table table-striped table-bordered">
                    <thead class="table-light">
                        <tr>
                            <th>Tipo</th>
                            <th>Veiculo</th>
                            <th>Categoria</th>
                            <th>Valor</th>
                            <th>Data Referência</th>
                            <th>Data Lançamento</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pagamentos as $pagamento)
                        <tr class="{{ $pagamento->tipo == 'R' ? 'bg-success' : 'bg-danger'}} text-white" style="color: #fff !important">
                            <td class="text-white" >{{ $pagamento->tipo }}</td>
                            <td class="text-white">{{ $pagamento->veiculo }}</td>
                            <td class="text-white">{{ $pagamento->categoria->nome ?? 'N/A' }}</td>
                            <td class="text-white">€ {{ number_format($pagamento->valor, 2, ',', '.') }}</td> <!-- Adicionado o símbolo do euro -->
                            <td class="text-white">{{ \Carbon\Carbon::parse($pagamento->data)->format('d/m/Y') }}</td>
                            <td class="text-white">{{ $pagamento->created_at ? $pagamento->created_at->format('d/m/Y H:i') : 'N/A' }}</td>
                            <td>
                                <i class="fas fa-edit editar_lancamento text-white"
                                    style="cursor: pointer;"
                                    title="Editar"
                                    data-dados="{{$pagamento}}"
                                    data-bs-toggle="modal" 
                                    data-bs-target={{$pagamento->tipo == 'R' ? "#modalEntradas" : "#modalSaidas"}}
                                ></i>
                
                                <small>
                                    <button type="button" class="btn btn-sm" title="Excluir" style="background: none; border: none" 
                                    data-rota="{{ route('pagamentos.destroy-transacao', $pagamento->id) }}" 
                                    onclick="confirmDelete(this)">
                                        <i class="fas fa-trash text-danger"></i>
                                    </button>
                                </small>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>


    <div class="col-md-2 toggleContent2" style="display: none">
        <ul class="list-group">
            <li class="list-group-item active bg-danger border-0 d-flex justify-content-between" 
                data-bs-toggle="modal" 
                data-bs-target="#modalCategoriaSaida"
            >
                <span>Saídas</span>
                <span><i class="fa fa-plus-circle" aria-hidden="true" style="cursor: pointer;" title="Adicionar Categoria"></i></span>
            </li>
            @foreach($categoria->where('tipo', 'despesa') as $cat)
            <li class="list-group-item">
                <span>
                    <small>  
                    {{$cat->ordem}}° -
                    {{ $cat->nome }}
                    </small>
                   
                </span>
                <span>
                    {{-- Ícone de edição --}}
                    <i class="fas fa-edit " data-bs-toggle="modal" data-bs-target="#modalCategoriaSaida" 
                       data-id="{{ $cat->id }}"
                       data-nome="{{ $cat->nome }}" 
                       data-ordem="{{ $cat->ordem }}" 
                       data-tipo="{{ $cat->tipo }}" 
                       style="cursor: pointer;" title="Editar Categoria"></i>
    
                    {{-- Ícone para adicionar item à categoria --}}
                    <i class="fa fa-plus-circle registro_despesa" aria-hidden="true"
                        style="cursor: pointer;" 
                        title="Adicionar Item à Categoria"
                        data-bs-toggle="modal" 
                        data-bs-target="#modalSaidas"
                        data-id={{$cat->id}}
                        >
                    </i>
                </span>
            </li>
            @endforeach
        </ul>
    </div>
    
    
</div>