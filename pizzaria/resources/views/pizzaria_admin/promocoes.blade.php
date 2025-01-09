@extends('layouts.layout_adm')

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

@section('content')
<div class="container">
    <h1>Gerenciar Promoções</h1>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Botão para abrir o modal de Adicionar Promoção --}}
    <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#addPromotionModal">
        Adicionar Promoção
    </button>

    {{-- Tabela de promoções --}}
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Valor</th>
                <th>Produtos</th>
                <th>Dias</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($promocoes as $promocao)
                <tr>
                    <td>{{ $promocao->id }}</td>
                    <td>R$ {{ number_format($promocao->value, 2, ',', '.') }}</td>
                    <td>{{ implode(', ', $promocao->products) }}</td>
                    <td>{{ implode(', ', $promocao->days) }}</td>
                    <td>
                        {{-- Botão para abrir o modal de Editar Promoção --}}
                        <button type="button" class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editPromotionModal-{{ $promocao->id }}">
                            Editar
                        </button>

                        {{-- Formulário de Exclusão --}}
                        <form action="{{ route('promo_adm.destroy', $promocao->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir esta promoção?')">Excluir</button>
                        </form>
                    </td>
                </tr>

                {{-- Modal de Edição de Promoção --}}
                <div class="modal fade" id="editPromotionModal-{{ $promocao->id }}" tabindex="-1" aria-labelledby="editPromotionModalLabel-{{ $promocao->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editPromotionModalLabel-{{ $promocao->id }}">Editar Promoção</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{ route('promo_adm.update', $promocao->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')

                                    <div class="mb-3">
                                        <label for="value" class="form-label">Valor Promocional</label>
                                        <input type="number" name="value" id="value" step="0.01" class="form-control" value="{{ $promocao->value }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="products">Produtos</label>
                                        <select name="products[]" id="products" class="form-control" multiple required>
                                            @foreach($pizzas as $pizza)
                                                <option value="{{ $pizza->id }}" {{ in_array($pizza->id, $promocao->products ?? []) ? 'selected' : '' }}>
                                                    {{ $pizza->nome_pizza }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <label for="days" class="form-label">Dias da Semana</label>
                                        <select name="days[]" id="days" class="form-control" multiple required>
                                            @foreach(['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'] as $day)
                                                <option value="{{ $day }}" {{ in_array($day, $promocao->days) ? 'selected' : '' }}>
                                                    {{ ucfirst($day) }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <button type="submit" class="btn btn-success">Atualizar Promoção</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Nenhuma promoção encontrada.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

{{-- Modal para Adicionar Promoção --}}
<div class="modal fade" id="addPromotionModal" tabindex="-1" aria-labelledby="addPromotionModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addPromotionModalLabel">Adicionar Promoção</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('promo_adm.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="value" class="form-label">Valor Promocional</label>
                        <input type="number" name="value" id="value" step="0.01" class="form-control" required>
                    </div>

                    <div class="form-group">
                        <label for="products">Produtos</label>
                        <select name="products[]" id="products" class="form-control" multiple required>
                            @foreach($pizzas as $pizza)
                                <option value="{{ $pizza->id }}">{{ $pizza->nome_pizza }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="days" class="form-label">Dias da Semana</label>
                        <select name="days[]" id="days" class="form-control" multiple required>
                            <option value="Monday">Segunda-feira</option>
                            <option value="Tuesday">Terça-feira</option>
                            <option value="Wednesday">Quarta-feira</option>
                            <option value="Thursday">Quinta-feira</option>
                            <option value="Friday">Sexta-feira</option>
                            <option value="Saturday">Sábado</option>
                            <option value="Sunday">Domingo</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-success">Salvar Promoção</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
