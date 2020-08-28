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
        </tr>
        @endforeach
    </table>
@else
    <h1>{{ $message }}</h1>

@endif