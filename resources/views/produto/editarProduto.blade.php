<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Produto</title>
</head>
<body>
    <h1>Editar um Produto</h1>
    <form action="{{ route('product-edit', ['product' => $product->id]) }}" method="POST">
        @csrf
        @method('PUT')
        <label for="">Nome do Produto:</label>
        <input type="text" name="name" value="{{ $product->name }}">

        <label for="">Categoria do Produto:</label>
        <input type="text" name="category" value="{{ $product->category }}">

        <input type="submit" value="Editar Produto">
    </form> 
</body>
</html>