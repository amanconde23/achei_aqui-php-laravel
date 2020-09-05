<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
</head>
<body>
    <h1>Editar um Usuário</h1>
    <form action="{{ route('user-edit', ['user' => $user->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="">Nome do Usuário:</label>
        <input type="text" name="name" value="{{ $user->name }}">

        <label for="">Telefone:</label>
        <input type="text" name="phone" value="{{ $user->phone }}">

        <label for="">Permissão do Usuário:</label>
        <input type="text" name="usertype" value="{{ $user->usertype }}">

        <label for="">Email do Usuário:</label>
        <input type="text" name="email" value="{{ $user->email }}">

        <input type="submit" value="Editar Usuário">
    </form>
</body>
</html>