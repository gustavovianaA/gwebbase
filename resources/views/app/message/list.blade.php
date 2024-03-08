@extends('app.layouts.app')

@section('content')
<div class="container">
    <h2>Mensagens</h2>
</div>



<div class="container">

    @if (isset($request))
    {{ $messages->appends($request)->links() }}

    Exibindo {{ $messages->count() }} mensagens de {{ $messages->total() }} (de {{ $messages->firstItem() }} a
    {{ $messages->lastItem() }})
    <br>
    <hr>
    @endif

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Telefone</th>
                <th scope="col">Email</th>
                <th scope="col">Mensagem</th>
                <th scope="col">Data</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>

            @foreach ($messages as $message)
            <tr>
                <td>{{ $message->name }}</td>
                <td>{{ $message->telephone }}</td>
                <td>{{ $message->email }}</td>
                <td>{{ $message->message }}</td>
                <td>{{ $message->created_at->format('d/m/Y') }}</td>
                <td>

                    <form style="display: inline" id="form_{{ $message->id }}" method="post" action="{{ route('message.destroy', ['message' => $message->id]) }}">
                        @method('DELETE')
                        @csrf
                        <!--<button type="submit">Excluir</button>-->
                        <a href="#" class="btn btn-danger" onclick="document.getElementById('form_{{ $message->id }}').submit()">Excluir</a>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>

    @if (isset($request))
    {{ $messages->appends($request)->links() }}

    Exibindo {{ $messages->count() }} mensagens de {{ $messages->total() }} (de {{ $messages->firstItem() }} a
    {{ $messages->lastItem() }})
    <br>
    <hr>
    @endif

</div>
@endsection