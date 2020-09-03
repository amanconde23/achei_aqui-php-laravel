<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Produtos Cadastrados</title>
</head>
<body>
    <h1>Listar Meus Produtos Cadastrados</h1>
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
            <td>
                @foreach($product->images as $image)
                    <img src="{{ env('APP_URL') }}/storage/{{ $image->path }}" alt="">
                @endforeach
            </td>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category }}</td>
            <td>{{ $product->user->name }}</td>
            <td>{{ $product->user->phone }}</td>
            <td>
                <a href="{{ route('product-show-details', ['product' => $product->id]) }}">Ver Produto</a>
                <a href="{{ route('product-edit-form', ['product' => $product->id]) }}">Editar Produto</a>
                <form action="{{ route('product-destroy', ['product' => $product->id]) }}" method="post">
                    @csrf
                    <!-- form spoofing (falsifica a verbalização) -->
                    @method('delete')
                    <input type="hidden" name="product-destroy" value="{{ $product->id }}">
                    <input type="submit" value="Excluir Produto">
                </form>
            </td>
        </tr>
        @endforeach
    </table>
</body>
</html>
