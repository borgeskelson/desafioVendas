<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Editar um usuário</title>
</head>
<body>
    <form action="{{ route('atualizar_usuario', ['id' => $usuario->id]) }}" method="POST">
        @csrf
        <label for="">Nome</label>
        <input type="text" name="nome" value="{{ $usuario->nome }}"><br/>
        <label for="">E-mail</label>
        <input type="text" name="email" value="{{ $usuario->email }}"><br/>
        <button>Salvar</button>
    </form>
</body>
</html>
