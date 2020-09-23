<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver Usuário</title>
</head>
<body>

    <h1>{{ $user->name }}</h1>
    <p>{{ $user->email }}</p>
    <p>{{ $user->phone }}</p>
    <p>{{ $user->password }}</p>

    <td>
        <a href="{{ route('user-edit-form', ['user' => Auth::user()->id]) }}">Editar Usuário</a>
        <form action="{{ route('user-destroy', ['user' => Auth::user()->id]) }}" method="post">
            @csrf
            @method('delete')
            <input type="hidden" name="user-destroy'" value="{{ $user->id }}">
            <input type="submit" value="Excluir Perfil">
        </form>
    </td>

</body>
</html>