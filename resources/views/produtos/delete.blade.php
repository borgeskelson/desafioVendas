<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Remover um produto</title>
</head>
<body>
    <form action="{{ route('remover_produto', ['id' => $produto->id]) }}" method="POST">
        @csrf
        <label for="">Tem certeza que deseja remover o produto?</label><br/>
        <input type="text" name="codigo" value="{{ $produto->codigo }}">
        <input type="text" name="nome" value="{{ $produto->nome }}"><br/>
        <button>Sim</button>
    </form>
</body>
</html>
