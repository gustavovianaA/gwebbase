<div class="sideBar">
    <i id="manipulate-sidebar" class="bg-white  p-3 fas fa-chevron-left text-danger fa-2x"></i>
</div>
<div id="main-sidebar" class="sideBar admin col-lg-3">
    <h4>Menu</h4>
    <ul>
        <li>
            <a href="{{ route('gexample.create') }}" data-toggle="tooltip" title="Cadastrar Veículo">
                <i class="far fa-edit"></i> Cadastrar Exemplo
            </a>
        </li>

        <li>
            <a href="{{ route('gexample.index') }}" data-toggle="tooltip" title="Listar Posts">
                <i class="fas fa-list"></i> Listar Exemplos
            </a>
        </li>
        <hr>
        <li>
            <a href="{{ route('message.index') }}" data-toggle="tooltip" title="Listar Categorias">
            <i class="fas fa-list"></i> Listar mensagens 
            </a>
        </li>
        <hr>
        <li>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                <i class="fas fa-envelope"></i> Sair
            </a>
        </li>
    </ul>
</div>