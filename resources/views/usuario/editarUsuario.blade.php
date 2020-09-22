<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <form action="{{ route('search-user-results') }}" method="GET">
        @csrf
        <input type="text" name="searchUser" placeholder="Digite a sua busca">
        <button type="submit">Buscar</button>
    </form>

    <h1>Editar um Usuário</h1>
    <form action="{{ route('user-edit', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="">Nome do Usuário:</label>
        <input type="text" name="name" value="{{ $user->name }}">

        <label for="">Email do Usuário:</label>
        <input type="text" name="email" value="{{ $user->email }}">

        <label for="">Telefone do Usuário:</label>
        <input type="text" name="phone" value="{{ $user->phone }}">

        <label for="">Senha do Usuário:</label>
        <input type="text" name="password" value="{{ $user->password }}">

        <input type="submit" value="Editar Usuário">
    </form>
</body>
</html>