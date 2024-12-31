{{-- Puxando o layout --}}
@extends('layouts.layout_adm')

{{-- Mudando o título da página dinamicamente --}}
@section('view-title', 'Login - Administrador')

{{-- Conteúdo da página --}}
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email_usuario" class="form-label">Email</label>
                            <input type="email" name="email_usuario" id="email_usuario" class="form-control" value="{{ old('email_usuario') }}" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="senha_usuario" class="form-label">Senha</label>
                            <input type="password" name="senha_usuario" id="senha_usuario" class="form-control" required>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Entrar</button>
                    </form>
                </div>
                <div class="card-footer text-center">
                    <small>Ainda não tem uma conta? <a href="#">Registre-se aqui</a></small>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection