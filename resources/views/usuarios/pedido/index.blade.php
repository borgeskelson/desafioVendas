@extends('index')
@section('title', 'Pedidos')
@section('content')
<div class="container mt-5">
    <h2>Meus Pedidos</h2>

    @include('includes.messages')

    <table class="table mt-3" style="width: 70%">
        <thead>
            <tr>
            <th scope="col">Número</th>
            <th scope="col">Última atualização</th>
            <th scope="col">Total</th>
            <th scope="col">Situação</th>
            <th scope="col">Gerenciar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($usuario->pedidos as $pedido)
            <tr>
                <td>#{{ $pedido->id }}</td>
                <td>{{ $pedido->updated_at }}</td>
                <td>0.00</td>
                <td>{{ ($pedido->finalizado) ? 'Finalizado' : 'Em aberto' }}</td>
                <td>
                    @if (!$pedido->finalizado)
                        <a href="/pedidos/{{ $pedido->id }}/checkout" class="btn btn-sm btn-success">Checkout</a>
                        <a href="" class="btn btn-sm btn-primary">Finalizar</a>
                    @else
                        <a href="" class="btn btn-sm btn-info">Visualizar</a>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="text-left mt-5" style="width: 70%">
        <a class="btn btn-sm btn-secondary" href="/home">Voltar</a>
    </div>
</div>

@endsection