@extends('index')
@section('title', 'Home')
@section('content')
<div class="container my-4">
    <h2 class="display-5" style="padding-bottom: 20px;">Bem-vindo, {{ $usuario->nome}}!</h2>
    
    @include('includes.messages')
    
    <div class="row">
        @foreach ($produtos as $produto)
        <div class="col-sm-4">
            <div class="card mb-3">
                <div style="display: flex;align-items: center;height: 250px;vertical-align: middle;">
                    <img class="card-img-top mx-auto img-fluid card-image" src="images/{{ $produto->url_imagem }}">
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{ $produto->nome }}</h5>
                    <small class="text-muted">R$ {{ $produto->preco }}</small>

                    @if ($produto->quantidade > 0)
                        <form action="{{ route('pedidos.store') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_usuario" value="{{$usuario->id}}">
                            <input type="hidden" name="id_produto" value="{{$produto->id}}">
                            <input type="hidden" name="preco_produto" value="{{$produto->preco}}">
                            <input type="hidden" name="qtd_produto" value="1">
                            <p class="card-text">Disponível: {{ $produto->quantidade }}</p>
                            <button type="submit" class="btn btn-lg btn-primary">Adicionar</button>
                        </form>
                    @else
                        <p class="card-text" style="color: red">Produto indisponível</p>
                    @endif
                </div>
            </div>    
        </div>
        @endforeach
    </div>
</div>
@endsection