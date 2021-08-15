@extends('index')
@section('title', 'Pedido')
@section('content')
<div class="container mt-5">
    <h2 class="display-5" style="padding-bottom: 20px;">Checkout - Pedido #{{ $pedido->id }}</h2>

    @include('includes.messages')

    <form action="{{ route('pedidos.checkout', $pedido->id) }}" method="POST">
    @csrf
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
                    <input type="hidden" name="detalhesPedido[]" id="" value="{{ $detalhePedido->id }}">
                    <td>{{ $detalhePedido->produto['nome'] }}</td>
                    <td>R$ {{ $detalhePedido->preco_produto }}</td>
                    <td>
                        <label>x</label>
                        <input type="number" name="qtd_produto[]" 
                            min="1" max="{{ $detalhePedido->produto['quantidade'] }}" 
                            value="{{ $detalhePedido->qtd_produto }}" 
                            onChange="javascript:alteraSubtotal('st_{{ $detalhePedido->id }}', {{ $detalhePedido->preco_produto }}, this.value);"
                            required>
                    </td>
                    <td>
                        <label>R$</label>
                        <input type="number" id="st_{{ $detalhePedido->id }}" name="st_{{ $detalhePedido->id }}" 
                            value="{{ $subtotal }}" 
                            disabled>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div class="text-left mt-5" style="width: 70%">
            <p style="font-weight: bold;">
                <label>Total (R$):</label>
                <input type="number" id="total_pedido" name="total_pedido" value="{{ $total }}" disabled>
            </p>
            <button type="submit" class="btn btn-sm btn-primary">Finalizar</button>
            <a class="btn btn-sm btn-secondary" href="{{ url()->previous() }}">Voltar</a>
        </div>
    </form>
</div>
<script>
    function alteraSubtotal(id, preco, qtd) {
        document.getElementById(id).value = preco * qtd;

        var total = 0;
        var inputs = document.querySelectorAll('input[name^="st_"]');
        [].forEach.call(inputs, function(input) {
            total = total + parseFloat(input.value);
        });
        document.getElementById('total_pedido').value = total;
    }
</script>

@endsection