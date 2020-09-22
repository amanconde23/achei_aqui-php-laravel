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

</body>
</html>