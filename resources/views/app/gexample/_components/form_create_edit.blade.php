@if (isset($gexample->id))
<form method="post" action="{{ route('gexample.update', ['gexample' => $gexample->id]) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    @else
    <form method="post" action="{{ route('gexample.store') }}" enctype="multipart/form-data">
        @csrf
        @endif

        <div>
            <h4 class="d-inline-block">Valor Booleano?</h4>
            <div class="form-check d-inline-block">
                <input class="form-check-input" type="radio" name="truefalse" id="truefalseYes" value="1" {{ ($gexample->onsite ?? old('onsite')) == '1' ? 'checked' : '' }}>
                <label style="font-size: 1.3em" class="form-check-label" for="truefalseYes">
                    Sim
                </label>
            </div>
            <div class="form-check d-inline-block">
                <input class="form-check-input" type="radio" name="truefalse" id="truefalseNo" value="0" {{ ($gexample->onsite ?? old('onsite')) == '0' ? 'checked' : '' }} {{ !isset($gexample->onsite) ? 'checked' : '' }}>
                <label style="font-size: 1.3em" class="form-check-label" for="truefalseNo">
                    Não
                </label>
            </div>
        </div>


        <hr>

        @if (isset($gexample->id))
        <div>
            <h4 class="d-inline-block">Trocar Imagens?</h4>
            <div class="form-check d-inline-block">
                <input class="form-check-input changeImagesRadio" type="radio" name="changeImages" id="changeImagesYes" value="1">
                <label style="font-size: 1.3em" class="form-check-label" for="changeImagesYes">
                    Sim
                </label>
            </div>
            <div class="form-check d-inline-block">
                <input class="form-check-input changeImagesRadio" type="radio" name="changeImages" id="changeImagesNo" value="0" checked>
                <label style="font-size: 1.3em" class="form-check-label" for="changeImagesNo">
                    Não
                </label>
            </div>
        </div>
        @endif

        <div id="{{ isset($gexample->id) ? 'cover-gallery' : 'cover-gallery-new' }}" style="{{ isset($gexample->id) ? 'display: none' : '' }}">
            <div class="form-group">
                <label for="picture">Imagem Principal</label>
                <div class="custom-file  ">
                    <input type="file" name="picture" class="form-control" />
                </div>
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-group">
                <label for="gallery">Demais Imagens</label>
                <input class="form-control" id="gallery" type="file" accept="image/*" name="gallery[]" multiple />
            </div>
        </div>


        <div class="form-group">
            <label for="title">Titulo: <sup class="text-danger">*</sup></label>
            <input type="text" name="title" id="title" value="{{ $gexample->title ?? old('title') }}" class="form-control ">
            <div class="form-text text-danger">{{ $errors->has('title') ? '* ' . $errors->first('title') : '' }}</div>
        </div>

        <div class="form-group">
            <label for="price">Valor: <sup class="text-danger">*</sup></label>
            <input type="text" name="price" id="price" value="{{ $gexample->price ?? old('price') }}" class="form-control input-money-value">
            <div class="form-text text-danger">{{ $errors->has('price') ? '* ' . $errors->first('price') : '' }}</div>
        </div>

        <div class="form-group">
            <label for="numberinteger">Número: <sup class="text-danger">*</sup></label>
            <input type="number" name="numberinteger" id="numberinteger" value="{{ $gexample->numberinteger ?? old('numberinteger') }}" class="form-control ">
            <div class="form-text text-danger">{{ $errors->has('numberinteger') ? '* ' . $errors->first('numberinteger') : '' }}</div>
        </div>
        
        <div class="form-group">
            <label for="details">Informações do veículo: <sup class="text-danger">*</sup></label>
            <textarea name="details" id="details" class="summernote form-control  " rows="5">
            {{ $gexample->details ?? old('details') }}
            </textarea>
            <div class="form-text text-danger">{{ $errors->has('details') ? '* ' . $errors->first('details') : '' }}
            </div>
        </div>



        <hr class="mt-5">



        <div class="row">





            <div class="form-group col-6 col-sm-3">
                <label for="doors">Portas<sup class="text-danger">*</sup></label>
                <select class="form-control "  id="doors">
                    <option value="">Selecione</option>
                    <option value="2" {{ ($gexample->doors ?? old('doors')) == '2' ? 'selected' : '' }}>2</option>
                    <option value="3" {{ ($gexample->doors ?? old('doors')) == '3' ? 'selected' : '' }}>3</option>
                    <option value="4" {{ ($gexample->doors ?? old('doors')) == '4' ? 'selected' : '' }}>4</option>
                    <option value="5" {{ ($gexample->doors ?? old('doors')) == '5' ? 'selected' : '' }}>5</option>
                </select>
                <div class="invalid-feedback">
                </div>
            </div>

            <div class="form-group col-6 col-sm-3">
                <label for="body">Carroceria<sup class="text-danger">*</sup></label>
                <select class="form-control "  id="body">
                    <option value="">Selecione</option>
                    <option value="Hatch" {{ ($gexample->body ?? old('body')) == 'Hatch' ? 'selected' : '' }}>Hatch</option>
                    <option value="Sedan" {{ ($gexample->body ?? old('body')) == 'Sedan' ? 'selected' : '' }}>Sedan</option>
                    <option value="Utilitário" {{ ($gexample->body ?? old('body')) == 'Utilitário' ? 'selected' : '' }}>
                        Utilitário</option>
                    <option value="SUV" {{ ($gexample->body ?? old('body')) == 'SUV' ? 'selected' : '' }}>SUV</option>
                    <option value="Minivan" {{ ($gexample->body ?? old('body')) == 'Minivan' ? 'selected' : '' }}>Minivan
                    </option>
                    <option value="Moto" {{ ($gexample->body ?? old('body')) == 'Moto' ? 'selected' : '' }}>Moto</option>
                    <option value="Outros" {{ ($gexample->body ?? old('body')) == 'Outros' ? 'selected' : '' }}>Outros</option>
                </select>
                <div class="invalid-feedback">
                </div>
            </div>

        </div>

        @if (isset($gexample->id))
        <input type="submit" value="Salvar GExemplo" class="btn  btn-primary btn-block" data-toggle="tooltip" title="Salvar Veículo">
        @else
        <input type="submit" value="Cadastrar GExemplo" class="btn btn-primary btn-block" data-toggle="tooltip" title="Cadastrar Veículo">
        @endif

    </form>