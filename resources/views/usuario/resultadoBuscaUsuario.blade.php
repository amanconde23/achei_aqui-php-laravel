@if(isset($details))
    <h1>Resultado da busca por {{ $query }} :</h1>
    <table>
        <tr>
            <td>Nome:</td>
        </tr>
        @foreach($details as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td><a href="{{ route('user', ['user' => $user->id]) }}">Avaliar Usuário</a></td>
        </tr>
        @endforeach
    </table>
@else
    <h1>{{ $message }}</h1>
    <a href="{{ route('home') }}">Voltar para a página inicial</a>
@endif