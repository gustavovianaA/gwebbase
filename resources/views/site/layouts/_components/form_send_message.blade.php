<div class="col-md-12">

    @if(session()->has('responseMessage'))
    <div class="">
        <h3>{{ session()->get('responseMessage') }}</h3>
    </div>
    @endif


    <form method="post" action="{{ route('site.message') }}" id="contactForm">
        @csrf

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="name" class="form-label">Nome</label>
                    <input required type="text" name="name" class="form-control" id="name">
                    <div class="form-text text-danger">
                        {{ $errors->has('name') ? '* ' . $errors->first('name') : '' }}
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input required type="email" name="email" class="form-control" id="exampleInputEmail1">
                    <div class="form-text text-danger">
                        {{ $errors->has('email') ? '* ' . $errors->first('email') : '' }}
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="mb-3">
                    <label for="telephone" class="form-label">Telefone</label>
                    <input required type="text" name="telephone" class="form-control" id="telephone">
                    <div class="form-text text-danger">
                        {{ $errors->has('telephone') ? '* ' . $errors->first('telephone') : '' }}
                    </div>
                </div>
            </div>
        </div>

        <div class="input-group mb-3">
            <span class="input-group-text">Mensagem</span>
            <textarea required name="message" class="form-control" aria-label="With textarea"></textarea>
            <div class="form-text text-danger">
                {{ $errors->has('message') ? '* ' . $errors->first('message') : '' }}
            </div>
        </div>

        <!-- Form submit button, including reCAPTCHA V3 attributes -->
        <div class="d-grid">
            <button class="g-recaptcha btn btn-primary btn-lg " data-sitekey="{{ config('services.recaptcha_v3.siteKey') }}" data-callback="onSubmit" data-action="submitContact">Enviar</button>
        </div>
    </form>
</div>