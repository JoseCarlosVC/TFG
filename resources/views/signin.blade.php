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
                            <label for="password"
                                class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') no es válida @enderror" name="password"
                                    required autocomplete="new-password">

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
                                <input value="Registrarse" type="submit" class="btn btn-primary" />
                            </div>
                        </div>












                        <label for="nombreUsuario">Nombre de usuario: </label>
                        <input type="text" name="nombreUsuario" required>
                        <br>
                        <label for="apellidos">Apellidos: </label>
                        <input type="text" name="apellidos" required>
                        <br>
                        <label for="correo">Correo electrónico: </label>
                        <input type="email" name="correo" required>
                        <br>
                        <label for="fechaNacimiento">Fecha de nacimiento: </label>
                        <input type="date" name="fechaNacimiento" required>
                        <br>
                        <label for="direccion">Dirección: </label>
                        <input type="text" name="direccion" required>
                        <br>
                        <label for="telefono">Número de teléfono: </label>
                        <input type="text" name="telefono" required>
                        <br>
                        <label for="password">Contraseña: </label>
                        <input type="password" name="password" required>
                        <br>
                        <input type="submit" value="Enviar">
                    </form>

                    @include('footer')
