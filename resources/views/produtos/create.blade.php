<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cadastrar um novo produto</title>
</head>
<body>
    <form action="{{ route('incluir_produto') }}" method="POST">
        @csrf
        <label for="">Código</label>
        <input type="text" name="codigo"><br/>
        <label for="">Nome</label>
        <input type="text" name="nome"><br/>
        <label for="">Preço</label>
        <input type="text" name="preco"><br/>
        <label for="">Quantidade</label>
        <input type="text" name="quantidade"><br/>
        <button>Salvar</button>
    </form>
</body>
</html>
