@extends('site.layouts.main')

@section('content')
<a href="{{ route('site.home') }}">
    <p>Home</p>
</a>
<a href="{{ route('site.contact') }}">
    <p>Contato</p>
</a>
<p>Formulário de contato</p>
<div class="row">
    <div class="col-md-6">
        @component('site.layouts._components.form_send_message')
        @endcomponent
    </div>
</div>
@endsection