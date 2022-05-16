@include('head')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Product Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/producto') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="nombreProducto"
                                class="col-md-4 col-form-label text-md-end">{{ __('Product Name') }}</label>

                            <div class="col-md-6">
                                <input id="nombreProducto" type="text"
                                    class="form-control @error('nombreProducto') no es válido @enderror"
                                    name="nombreProducto" value="{{ old('nombreProducto') }}" required
                                    autocomplete="nombreProducto" autofocus>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="detalles"
                                class="col-md-4 col-form-label text-md-end">{{ __('Details') }}</label>

                            <div class="col-md-6">
                                <textarea id="detalles" class="form-control @error('detalles') no es válido @enderror" name="detalles"
                                    value="{{ old('detalles') }}" required autocomplete="detalles"
                                    autofocus></textarea>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="precio" class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>

                            <div class="col-md-6">
                                <input id="precio" type="number" step="any" min="0"
                                    class="form-control @error('precio') inválido @enderror" name="precio"
                                    value="{{ old('precio') }}" required autocomplete="precio">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="foto" class="col-md-4 col-form-label text-md-end">{{ __('Picture') }}</label>

                            <div class="col-md-6">
                                <input id="foto" type="file" class="form-control" name="foto" required
                                    autocomplete="foto">
                            </div>
                        </div>
                        <input type="hidden" name="idLocal" value="{{ Session::get('usuario')['id'] }}">
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input value="Registrar" type="submit" id="enviar" class="btn btn-primary" />
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@include('footer')
