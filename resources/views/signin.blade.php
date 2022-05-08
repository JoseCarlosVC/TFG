@include('head')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ url('/usuario') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="nombreUsuario"
                                class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                            <div class="col-md-6">
                                <input id="nombreUsuario" type="text"
                                    class="form-control @error('nombreUsuario') no es válido @enderror"
                                    name="nombreUsuario" value="{{ old('nombreUsuario') }}" required
                                    autocomplete="nombreUsuario" autofocus>

                                @error('nombreUsuario')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="apellidos"
                                class="col-md-4 col-form-label text-md-end">{{ __('Surname') }}</label>

                            <div class="col-md-6">
                                <input id="apellidos" type="text"
                                    class="form-control @error('apellidos') no es válido @enderror" name="apellidos"
                                    value="{{ old('apellidos') }}" required autocomplete="apellidos" autofocus>

                                @error('apellidos')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="correo"
                                class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="correo" type="email" class="form-control @error('correo') inválido @enderror"
                                    name="correo" value="{{ old('correo') }}" required autocomplete="correo">

                                @error('correo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="fechaNacimiento"
                                class="col-md-4 col-form-label text-md-end">{{ __('Birthdate') }}</label>

                            <div class="col-md-6">
                                <input id="fechaNacimiento" type="date"
                                    class="form-control @error('fechaNacimiento') inválida @enderror"
                                    name="fechaNacimiento" value="{{ old('fechaNacimiento') }}" required
                                    autocomplete="fechaNacimiento">

                                @error('fechaNacimiento')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="direccion"
                                class="col-md-4 col-form-label text-md-end">{{ __('Address') }}</label>

                            <div class="col-md-6">
                                <input id="direccion" type="text"
                                    class="form-control @error('direccion') inválida @enderror" name="direccion"
                                    value="{{ old('direccion') }}" required autocomplete="direccion">

                                @error('direccion')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') no es válida @enderror" name="password"
                                    required autocomplete="new-password">
                                <span class="invalid-feedback" role="alert">
                                    <strong>Holauenas</strong>
                                </span>
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm"
                                class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <input value="Registrarse" type="submit" id="enviar" class="btn btn-primary" />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@include('footer')
