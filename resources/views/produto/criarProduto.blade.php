<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Produto</title>
</head>
<body>
    <h1>Criar um Produto</h1>
    <form action="{{ route('product-store') }}" method="POST" enctype='multipart/form-data'>
        @csrf
        <label for="">Nome do Produto:</label>
        <input type="text" name="name">

        <label for="">Categoria do Produto:</label>
        <input type="text" name="category">

        <label for="">Imagem do Produto:</label>
        <input type="file" name="images[]" multiple>

        <input type="submit" value="Cadastrar Produto">
    </form> 
</body>
</html>