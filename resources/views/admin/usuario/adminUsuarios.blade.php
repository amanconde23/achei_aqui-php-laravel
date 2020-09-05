<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuários Cadastrados</title>
</head>
<body>
    <h1>Listar Todos os Usuários Cadastrados</h1>

    <table>
        <tr>
            <td>ID</td>
            <td>Nome:</td>
            <td>Telefone:</td>
            <td>Permissão do Usuário:</td>
            <td>Email:</td>
        </tr>

        @foreach ($users as $user)
        <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->phone }}</td>
            <td>{{ $user->usertype }}</td>
            <td>{{ $user->email }}</td>
            <td>
                <a href="{{ route('user-edit-form', ['user' => $user->id]) }}">Editar Usuario</a>
            </td>

        </tr>
        @endforeach
    </table>

</body>
</html>
