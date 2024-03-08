<div class="col-md-12">
    <h3>{{ $responseMessage }}</h3>
    <form method="post" action="{{ route('site.message') }}">
        @csrf
        <input type="hidden" name="target" value="{{ $confirm['third'] }}">
        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input type="text" name="name" class="form-control" id="name">
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="telephone" class="form-label">Telefone</label>
                    <input type="text" name="telephone" class="form-control" id="telephone">
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Mensagem</span>
            <textarea name="message" class="form-control" aria-label="With textarea"></textarea>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="response" required class="form-label">Responda {{ $confirm['first'] }} + {{ $confirm['second'] }} é igual à</label>
                    <input type="text" name="response" class="form-control" id="response">
                </div>
            </div>
        </div>
        <button type="submit" class="my-3 btn btn-primary">Enviar</button>
    </form>
</div>