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
            <td>
                <a href="{{ route('product-show-details', ['product' => $product->id]) }}">Ver Produto</a>
                <a href="{{ route('product-edit-form', ['product' => $product->id]) }}">Editar Produto</a>
            </td>
            <form action="{{ route('product-destroy', ['product' => $product->id]) }}" method="post">
                @csrf
                <!-- form spoofing (falsifica a verbalização) -->
                @method('delete')
                <input type="hidden" name="product-destroy" value="{{ $product->id }}">
                <input type="submit" value="Excluir Produto">
            </form>
        </tr>
        @endforeach
    </table>

</body>
</html>
