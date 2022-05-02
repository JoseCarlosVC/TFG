@include('head')
<form action="{{ url('/usuario') }}" method="POST">
    @csrf
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
