<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Produtos Cadastrados</title>
</head>
<body>
    <form action="{{ route('search-results') }}" method="GET">
        @csrf
        <input type="text" name="search" placeholder="Digite a sua busca">
        <button type="submit">Buscar</button>
    </form>

    <h1>Listar Produtos Cadastrados</h1>

    <table>
        <tr>
            <td>ID</td>
            <td>Nome:</td>
            <td>Categoria:</td>
            <td>Proprietário:</td>
            <td>Telefone:</td>
        </tr>

        @foreach ($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category }}</td>
            <td>{{ $product->user->name }}</td>
            <td>{{ $product->user->phone }}</td>
        </tr>
        @endforeach
    </table>

</body>
</html>
