@extends('index')
@section('title', 'Pedido')
@section('content')
<div class="container mt-5">
    <h2 class="display-5" style="padding-bottom: 20px;">Visualizar - Pedido #{{ $pedido->id }}</h2>
    <table class="table mt-3" style="width: 70%">
        <thead>
            <tr>
            <th scope="col">Produto</th>
            <th scope="col">Preço</th>
            <th scope="col">Quantidade</th>
            <th scope="col">Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php ($total = 0)
            @foreach ($detalhesPedido as $detalhePedido)
                @php ($subtotal = $detalhePedido->preco_produto * $detalhePedido->qtd_produto)
                @php ($total += $subtotal)
            <tr>
                <td>{{ $detalhePedido->produto['nome'] }}</td>
                <td>R$ {{ $detalhePedido->preco_produto }}</td>
                <td>x {{ $detalhePedido->qtd_produto }}</td>
                <td>R$ {{ $subtotal }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-left mt-5" style="width: 70%">
        <p style="font-weight: bold;">Total (R$): {{ $total }}</p>
        <a class="btn btn-sm btn-secondary" href="{{ url()->previous() }}">Voltar</a>
    </div>
</div>
@endsection