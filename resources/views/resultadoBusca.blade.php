@if(isset($details))
    <h1>Resultado da busca por {{ $query }} :</h1>
    <table>
        <tr>
            <td>Nome:</td>
            <td>Categoria:</td>
        </tr>
        @foreach($details as $product)
        <tr>
            <td>{{ $product->name }}</td>
            <td>{{ $product->category }}</td>
            <td><a href="{{ route('product-show-details', ['product' => $product->id]) }}">Ver Produto</a></td>
        </tr>
        @endforeach
    </table>
@else
    <h1>{{ $message }}</h1>
    <a href="{{ route('all-products') }}">Voltar para a página de produtos</a>
@endif