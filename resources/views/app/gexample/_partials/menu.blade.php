<div class="container">
    <hr>
    <nav class="navbar navbar-expand navbar-dark bg-light">
        <div class="container-fluid">

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item btn btn-primary mr-3">
                        <a class="nav-link active" aria-current="page" href="{{ route('gexample.create') }}">+ Novo</a>
                    </li>

                    @if (isset($gexample))
                    
                    <li class="nav-item btn btn-success mr-3">
                        <a class="nav-link active" href="{{ route('gexample.edit', ['gexample' => $gexample]) }}"><span>Editar</span></a>
                    </li>

                    @endif
                </ul>

            </div>
        </div>
    </nav>
    <hr>
</div>