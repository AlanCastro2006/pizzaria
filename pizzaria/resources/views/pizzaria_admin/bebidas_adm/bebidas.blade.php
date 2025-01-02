{{-- Puxando o layout --}}
@extends('layouts.layout_adm')

{{-- Mudando o título da página dinamicamente --}}
@section('view-title', 'Bebidas - Administrador')

{{-- Conteúdo da Navbar --}}
@section('navbar-content')

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav d-flex justify-content-end flex-grow-1">
            <li class="nav-item">
                <a class="nav-link roboto-regular" id="admin-indicator" aria-current="page" href="/adm/buttons">Modo Administrador</a>
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

{{-- Conteúdo da página --}}
@section('content')
    <div class="container mt-5">
        <h1 class="text-center">Administração de Bebidas</h1>
        <div class="text-end mb-3">
            <!-- Botão para abrir o modal de adicionar bebida -->
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addBebidaModal">Adicionar Bebida</button>
        </div>

        <!-- Verifica se há bebidas cadastradas -->
        @if($bebidas->isEmpty())
        <div class="alert alert-warning text-center">
            Não há bebidas cadastradas no momento.
        </div>
        @else
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Imagem</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach($bebidas as $bebida)
                <tr>
                    <td>{{ $bebida->nome_bebida }}</td>
                    <td>R$ {{ number_format($bebida->preco_bebida, 2, ',', '.') }}</td>
                    <td>
                        @if($bebida->imagem_bebida)
                        <img src="{{ asset($bebida->imagem_bebida) }}" alt="{{ $bebida->nome_bebida }}" width="50">
                        @else
                        Sem imagem
                        @endif
                    </td>
                    <td>
                        <!-- Botão para abrir o modal de edição -->
                        <button class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editBebidaModal{{ $bebida->id }}">Editar</button>

                        <!-- Formulário para excluir bebida -->
                        <form action="{{ route('bebidas_adm.destroy', $bebida->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza que deseja excluir esta bebida?')">Excluir</button>
                        </form>
                    </td>
                </tr>

                <!-- Modal de Edição -->
                <div class="modal fade" id="editBebidaModal{{ $bebida->id }}" tabindex="-1" aria-labelledby="editBebidaModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editBebidaModalLabel">Editar Bebida</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('bebidas_adm.update', $bebida->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="mb-3">
                                        <label for="nome_bebida" class="form-label">Nome</label>
                                        <input type="text" name="nome_bebida" id="nome_bebida" class="form-control" value="{{ $bebida->nome_bebida }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="preco_bebida" class="form-label">Preço</label>
                                        <input type="number" name="preco_bebida" id="preco_bebida" class="form-control" step="0.01" value="{{ $bebida->preco_bebida }}" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="imagem_bebida" class="form-label">Imagem (opcional)</label>
                                        <input type="file" name="imagem_bebida" id="imagem_bebida" class="form-control">
                                    </div>
                                    <button type="submit" class="btn btn-success">Salvar Alterações</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </tbody>
        </table>
        @endif

        <!-- Modal de Adicionar Bebida -->
        <div class="modal fade" id="addBebidaModal" tabindex="-1" aria-labelledby="addBebidaModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addBebidaModalLabel">Adicionar Bebida</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('bebidas_adm.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <label for="nome_bebida" class="form-label">Nome</label>
                                <input type="text" name="nome_bebida" id="nome_bebida" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="preco_bebida" class="form-label">Preço</label>
                                <input type="number" name="preco_bebida" id="preco_bebida" class="form-control" step="0.01" required>
                            </div>
                            <div class="mb-3">
                                <label for="imagem_bebida" class="form-label">Imagem (opcional)</label>
                                <input type="file" name="imagem_bebida" id="imagem_bebida" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-primary">Adicionar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection