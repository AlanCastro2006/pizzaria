{{-- Puxando o layout --}}
@extends('layouts.layout')

{{-- Mudando o título da página dinamicamente --}}
@section('view-title', 'Pizzaria')

{{-- Conteúdo da página --}}
@section('content')
    
<div class="banner">
    <img src="caminho-da-imagem/banner-pizzaria.jpg" alt="Banner da Pizzaria" class="banner-image">
    <div class="banner-text">
        <h1>Bem-vindo à Pizzaria!</h1>
        <p>Descubra os melhores sabores, feitos com carinho e ingredientes frescos.</p>
    </div>
</div>


@endsection