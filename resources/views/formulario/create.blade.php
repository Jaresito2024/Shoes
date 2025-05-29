<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario</title>
    <link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
</head>
<body>
    <div id="contentBox">
        <div id="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1>Shoes</h1>
                </div>
            </div>
        <h2>¡Registrate Ahora!</h2>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul style="list-style:none; padding-left: 0;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>  
            </div>
        @endif

        <form action="{{ route('formulario.store') }}" method="POST">
            @csrf
            <input type="text" name="nombre" placeholder="Nombre" value="{{ old('nombre') }}" required>
            <input type="text" name="apellido_paterno" placeholder="Apellido Paterno" value="{{ old('apellido_paterno') }}" required>
            <input type="text" name="apellido_materno" placeholder="Apellido Materno" value="{{ old('apellido_materno') }}" required>
            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            <input type="text" name="ciudad" placeholder="Ciudad" value="{{ old('ciudad') }}" required>
            <input type="text" name="pais" placeholder="País" value="{{ old('pais') }}" required>
            <input type="text" name="telefono" placeholder="Teléfono" value="{{ old('telefono') }}" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="password" name="password_confirmation" placeholder="Confirmar Contraseña" required>

            <div class="terminos-check">
                <label>
                    <input type="checkbox" name="terminos" value="1" {{ old('terminos') ? 'checked' : '' }}>
                    Acepto los Términos y Condiciones
                </label>
            </div>

            <button type="submit">Enviar</button>
        </form>

        <a href="{{route('formulario.login')  }}" class="yaCuenta">¿Ya tienes cuenta? Inicia sesión</a>
    </div>
</body>
</html>
