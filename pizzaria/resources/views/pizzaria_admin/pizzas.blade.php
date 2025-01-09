{{-- Layout padrão --}}
@extends('layouts.layout_adm')

{{-- Título da página --}}
@section('view-title', 'Gerenciar Pizzas')

{{-- Conteúdo da Navbar --}}
@section('navbar-content')

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav d-flex justify-content-end flex-grow-1">
        <li class="nav-item">
            <a class="nav-link roboto-regular" id="admin-indicator" aria-current="page" href="/admin/buttons">Modo Administrador</a>
        </li>
        <li class="nav-item">
            {{-- Botão de Logout --}}
            <a class="nav-link roboto-regular d-flex align-items-center gap-1" id="logout-icon" aria-current="page" data-bs-title="Logout" href="/admin/logout">
                Sair
                <span class="material-symbols--logout"></span>
            </a>
        </li>
    </ul>
</div>

@endsection

{{-- Conteúdo principal --}}
@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-12">
            {{-- Mensagens de feedback --}}
            @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            {{-- Card para a lista de pizzas --}}
            <div class="card">
                <div class="card-header text-center">
                    <h3>Gerenciar Pizzas</h3>
                </div>
                <div class="card-body">
                    {{-- Botão para adicionar nova pizza --}}
                    <div class="text-end mb-3">
                        <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addPizzaModal">
                            Adicionar Pizza
                        </button>
                    </div>

                    {{-- Tabela de pizzas cadastradas --}}
                    <table class="table table-bordered table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th>Nome</th>
                                <th>Ingredientes</th>
                                <th>Preço</th>
                                <th>Imagem</th>
                                <th>Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- Para cada pizza adiciona uma linha  -->
                            @forelse ($pizzas as $pizza)
                            <tr>
                                <td>{{ $pizza->nome_pizza }}</td>
                                <td>{{ $pizza->ingredientes }}</td>
                                <td>R$ {{ number_format($pizza->preco_pizza, 2, ',', '.') }}</td>
                                <td>
                                    @if ($pizza->imagem_pizza)
                                    <img src="{{ asset($pizza->imagem_pizza) }}" alt="Imagem da Pizza" class="img-thumbnail" style="width: 80px;">
                                    @else
                                    <img src="{{ asset('img/default_pizza.jpg') }}" alt="Imagem Padrão" class="img-thumbnail" style="width: 80px;">
                                    @endif

                                </td>
                                <td>
                                    {{-- Botão de editar --}}
                                    <button class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#editPizzaModal{{ $pizza->id }}">
                                        Editar
                                    </button>

                                    {{-- Botão de excluir --}}
                                    <form action="{{ route('pizzas_adm.destroy', $pizza->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta pizza?')">
                                            Excluir
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            {{-- Modal de edição --}}
                            <div class="modal fade" id="editPizzaModal{{ $pizza->id }}" tabindex="-1" aria-labelledby="editPizzaModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editPizzaModalLabel">Editar Pizza</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <form action="{{ route('pizzas_adm.update', $pizza->id) }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-body">
                                                {{-- Formulário de edição --}}
                                                <!-- Input do nome da pizza  -->
                                                <div class="mb-3">
                                                    <label for="nome_pizza_{{ $pizza->id }}" class="form-label">Nome da Pizza</label>
                                                    <input type="text" name="nome_pizza" id="nome_pizza_{{ $pizza->id }}" class="form-control" value="{{ $pizza->nome_pizza }}" required>
                                                </div>
                                                <!-- Input dos ingredientes  -->
                                                <div class="mb-3">
                                                    <label for="ingredientes_{{ $pizza->id }}" class="form-label">Ingredientes</label>
                                                    <input
                                                        type="text"
                                                        name="ingredientes"
                                                        id="ingredientes_{{ $pizza->id }}"
                                                        class="form-control"
                                                        value="{{ implode(', ', json_decode($pizza->ingredientes)) }}"
                                                        required>
                                                    <small class="form-text text-muted">
                                                        Separe os ingredientes com vírgulas. Ex: Queijo, Bacon, Tomate
                                                    </small>
                                                </div>
                                                <!-- Input do preço da pizza  -->
                                                <div class="mb-3">
                                                    <label for="preco_pizza_{{ $pizza->id }}" class="form-label">Preço</label>
                                                    <input type="number" name="preco_pizza" id="preco_pizza_{{ $pizza->id }}" class="form-control" value="{{ $pizza->preco_pizza }}" step="0.01" min="0" required>
                                                </div>
                                                <!-- Input da imagem da pizza (opcional)  -->
                                                <div class="mb-3">
                                                    <label for="imagem_pizza_{{ $pizza->id }}" class="form-label">Imagem (Opcional)</label>
                                                    <input type="file" name="imagem_pizza" id="imagem_pizza_{{ $pizza->id }}" class="form-control" accept="image/*">
                                                </div>
                                            </div>
                                            <!-- Botões  -->
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                                <button type="submit" class="btn btn-primary">Salvar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div> <!-- Fim do form -->
                            @empty
                            <tr>
                                <td colspan="7" class="text-center">Nenhuma pizza cadastrada.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal de adição --}}
<div class="modal fade" id="addPizzaModal" tabindex="-1" aria-labelledby="modalAddPizzaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddPizzaLabel">Adicionar Pizza</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pizzas_adm.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <!-- Nome -->
                    <div class="mb-3">
                        <label for="nome_pizza" class="form-label">Nome da Pizza</label>
                        <input type="text" name="nome_pizza" id="nome_pizza" class="form-control" required>
                    </div>

                    <!-- Preço -->
                    <div class="mb-3">
                        <label for="preco_pizza" class="form-label">Preço</label>
                        <input type="number" step="0.01" name="preco_pizza" id="preco_pizza" class="form-control" required>
                    </div>

                    <!-- Ingredientes -->
                    <div class="mb-3">
                        <label for="ingredientes" class="form-label">Ingredientes</label>
                        <input
                            type="text"
                            name="ingredientes"
                            id="ingredientes"
                            class="form-control"
                            placeholder="Ex: Queijo, Bacon, Tomate"
                            required>
                        <small class="form-text text-muted">
                            Separe os ingredientes com vírgulas.
                        </small>
                    </div>

                    <!-- Imagem -->
                    <div class="mb-3">
                        <label for="imagem_pizza" class="form-label">Imagem da Pizza</label>
                        <input type="file" name="imagem_pizza" id="imagem_pizza" class="form-control" accept="image/*">
                    </div>

                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div> <!-- Fim do form -->

@endsection