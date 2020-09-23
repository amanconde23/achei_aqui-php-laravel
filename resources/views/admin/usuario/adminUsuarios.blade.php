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
                <form action="{{ route('user-destroy-admin', ['user' => $user->id]) }}" method="post">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="user-destroy-admin" value="{{ $user->id }}">
                    <input type="submit" value="Banir Usuário">
                </form>
            </td>
        </tr>
        @endforeach
    </table>

</body>
</html>
