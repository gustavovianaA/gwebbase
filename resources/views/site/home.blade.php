@extends('site.layouts.main')

@section('content')
<a href="{{ route('site.home') }}"><p>Home</p></a>
<a href="{{ route('site.contact') }}"><p>Contato</p></a>
<h1>Hello World</h1>
<h2>GWeb Base by Gustavo Viana</h2>    
@endsection
