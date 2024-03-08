@extends('app.layouts.app')

@section('content')
<div class="container">
    <h2>GExemplo</h2>
</div>
@include('app.gexample._partials.menu')

<div class="container">
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Imagem</th>
                <th scope="col">Título</th>
                <th scope="col">Valor</th>
                <th scope="col">Opções</th>
            </tr>
        </thead>
        <tbody>

            @foreach($gexamples as $gexample)
            <tr>
            <th><img style="width: 60px; height: auto" src="{{ asset($gexample->picture) }}"></th>    
            <th><a href="{{ route('gexample.show', ['gexample' => $gexample]) }}">{{ $gexample->title }}</a></th>
                <th>{{ $gexample->price }}</th>
                <td>
                    <a href="{{ route('gexample.edit', ['gexample' => $gexample]) }}"><span class="btn btn-success">Editar</span></a>
                    <form  style="display: inline" id="form_{{$gexample->id}}" method="post" action="{{ route('gexample.destroy', ['gexample' => $gexample->id]) }}">
                        @method('DELETE')
                        @csrf
                        <!--<button type="submit">Excluir</button>-->
                        <a href="#" class="btn btn-danger" onclick="document.getElementById('form_{{$gexample->id}}').submit()">Excluir</a>
                    </form>
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>

@endsection
