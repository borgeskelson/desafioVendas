@extends('index')
@section('title', 'Home')
@section('content')
<div class="container my-4">
    <h2 class="display-5" style="padding-bottom: 20px;">Bem-vindo, {{ $usuario->nome}}!</h2>
    <div class="row">
        @foreach ($produtos as $produto)
        <div class="col-sm-4">
            <div class="card mb-3">
                <div style="background-image:url('{{ $produto->imagem }}');height:300px;background-size:cover;" class="img-fluid"></div>
                <div class="card-body">
                    <h5 class="card-title">{{ $produto->nome }}</h5>
                    <small class="text-muted">R$ {{ $produto->preco }}</small>
                    @if ($produto->quantidade > 0)
                        <p class="card-text">Disponível: {{ $produto->quantidade }}</p>
                    @else
                        <p class="card-text">Produto indisponível</p>
                    @endif
                    <a href="/pedidos/create/{{ $produto->id }}" class="btn btn-primary">Adicionar</a>
                </div>
            </div>    
        </div>
        @endforeach
    </div>
</div>
@endsection