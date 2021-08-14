<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Remover um usuário</title>
</head>
<body>
    <form action="{{ route('remover_usuario', ['id' => $usuario->id]) }}" method="POST">
        @csrf
        <label for="">Tem certeza que deseja remover o usuário?</label><br/>
        <input type="text" name="nome" value="{{ $usuario->nome }}">
        <input type="text" name="email" value="{{ $usuario->email }}"><br/>
        <button>Sim</button>
    </form>
</body>
</html>
