<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar um produto</title>
</head>
<body>
    <form action="{{ route('atualizar_produto', ['id' => $produto->id]) }}" method="POST">
        @csrf
        <label for="">Código</label>
        <input type="text" name="codigo" value="{{ $produto->codigo }}"><br/>
        <label for="">Nome</label>
        <input type="text" name="nome" value="{{ $produto->nome }}"><br/>
        <label for="">Preço</label>
        <input type="text" name="preco" value="{{ $produto->preco }}"><br/>
        <label for="">Quantidade</label>
        <input type="text" name="quantidade" value="{{ $produto->quantidade }}"><br/>
        <button>Salvar</button>
    </form>
</body>
</html>
