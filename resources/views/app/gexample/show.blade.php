@extends('app.layouts.app')

@section('content')
<div class="container">
    <h2>Título: {{ $gexample->title }}</h2>
</div>
@include('app.gexample._partials.menu')

<div class="container">

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('gexample.index') }}">GExemplos</a></li>
            <li class="breadcrumb-item active" aria-current="page">Ver</li>
        </ol>
    </nav>

    <section class="container my-5">
        <h2 class="mb-1">{{ $gexample->title }}</h2>

        <div>
            <h2 class="text-danger">R$ {{ $gexample->price }}</h2>
        </div>

        <hr>

        <div class="row">
            <article class="col-md-5">
                <div class="p-0 m-0">
                    <img id="gexample-imagem-principal" src="{{ asset($gexample->picture) }}" alt="{{ $gexample->title }}" style="width: 100%;height:auto;padding:0;margin:0">
                </div>

                <div class="pt-3">

                    @foreach ($gexample_gallery as $gallery)
                    <div class="p-1 d-inline-block">
                        <img class="rounded veiculo-miniatura" src="{{ asset($gallery) }}" alt="{{ $gexample->title }}" style="width: 120px;height:80px;padding:0;margin:0">
                    </div>
                    @endforeach

                </div>

            </article>

            <article class="col-md-7">
                <div class="row">
                    {!! $gexample->details !!}
                </div>
            </article>


        </div>
    </section>


</div>
@endsection