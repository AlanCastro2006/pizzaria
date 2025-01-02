{{-- Puxando o layout --}}
@extends('layouts.layout_adm')

{{-- Mudando o título da página dinamicamente --}}
@section('view-title', 'Bebidas - Administrador')

{{-- Conteúdo da Navbar --}}
@section('navbar-content')

<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav d-flex justify-content-end flex-grow-1">
        <li class="nav-item">
            <a class="nav-link roboto-regular" id="admin-indicator" aria-current="page" href="/admin/cards">Modo Administrador</a>
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
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Administração</h3>
                </div>
                <div class="card-body text-center">
                    <p>Escolha uma categoria para gerenciar:</p>
                    {{-- Grade flexível para os botões com imagens --}}
                    <div class="d-flex flex-wrap justify-content-center gap-4">
                        {{-- Botão para Bebidas --}}
                        <a href="/adm/bebidas" class="admin-btn">
                            <img src="{{ Vite::asset('resources/img/buttons/bebidas.jpg') }}" alt="Bebidas" class="btn-icon">
                            <span class="btn-label">Bebidas</span>
                        </a>
                        {{-- Botão para Pizzas --}}
                        <a href="/adm/pizzas" class="admin-btn">
                            <img src="/img/buttons/pizzas.png" alt="Pizzas" class="btn-icon">
                            <span class="btn-label">Pizzas</span>
                        </a>
                        {{-- Botão para Promoções --}}
                        <a href="/adm/promocoes" class="admin-btn">
                            <img src="/img/icons/promocoes.png" alt="Promoções" class="btn-icon">
                            <span class="btn-label">Promoções</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection