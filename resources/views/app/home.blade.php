@extends('app.layouts.app')

@section('content')
<h2 class="text-center">Painel de Controle</h2>
<div class="container">
    <div class="row">
        <div class="col-lg-4 p-3">
            <div class="sideBar admin">
                <h4 class="text-center">Exemplos</h4>
                <ul>
                    <li>
                        <a href="" data-toggle="tooltip" title="Cadastrar Exemplo">
                            <i class="far fa-edit"></i> Cadastrar Exemplo
                        </a>
                    </li>

                    <li>
                        <a href="" data-toggle="tooltip" title="Listar Posts">
                            <i class="fas fa-list"></i> Listar Exemplos
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-lg-4 p-3">
            <div class="sideBar admin">
                <h4 class="text-center">Mensagens</h4>
                <ul>
                    <li>
                        <a href="{{ route('message.index') }}" data-toggle="tooltip" title="Listar Posts">
                            <i class="fas fa-list"></i> Listar Mensagens
                        </a>
                    </li>
                </ul>
            </div>
        </div>

    </div>
</div>
@endsection