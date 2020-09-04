<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalhes do Produto</title>
</head>
<body>

    <h1>{{ $product->name }}</h1>
    <p>{{ $product->category }}</p>
    <p>{{ $product->user->name }}</p>
    <p>{{ $product->user->phone }}</p>
    <img src="{{ env('APP_URL') }}/storage/{{ $product->image }}" alt="">

</body>
</html>