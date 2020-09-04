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

    <h1>Listar Todos os Produtos Cadastrados</h1>

    <table>
        <tr>
            <td>Imagem</td>
            <td>ID</td>
            <td>Nome:</td>
            <td>Categoria:</td>
            <td>Proprietário:</td>
            <td>Telefone:</td>
        </tr>

        @foreach ($products as $product)
        <tr>
            <td><img src="{{ env('APP_URL') }}/storage/{{ $product->image }}" alt=""></td>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category }}</td>
            <td>{{ $product->user->name }}</td>
            <td>{{ $product->user->phone }}</td>
            <td>
                <a href="{{ route('product-show-details', ['product' => $product->id]) }}">Ver Produto</a>
            </td>
        </tr>
        @endforeach
    </table>

</body>
</html>
