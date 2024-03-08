@extends('app.layouts.app')

@section('content')
<div class="container">
    <h2>Adicionar Marca</h2>
</div>
@include('app.gexample._partials.menu')

<div class="container">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="{{ route('gexample.index') }}">GExemplo</a></li>
        <li class="breadcrumb-item active" aria-current="page">Criar</li>
    </ol>
</nav>

<div class="row justify-content-center">
    <div class="col-md-12">
        @component('app.gexample._components.form_create_edit')
        @endcomponent
    </div>
</div>
</div>

@endsection
