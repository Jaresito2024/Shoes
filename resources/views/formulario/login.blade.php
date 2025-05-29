<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
    <link rel="stylesheet" href="{{ asset('css/formulario.css') }}">
</head>
<body>
    <div id="contentBox">
        <h2>Bienvenido a Shoes</h2>

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

        <form action="{{ route('formulario.authenticate') }}" method="POST">
            @csrf

            <input type="email" name="email" placeholder="Email" value="{{ old('email') }}" required>
            <input type="password" name="password" placeholder="Contraseña" required>

            <div class="terminos-check">
                <label>
                    <input type="checkbox" name="terminos" value="1" {{ old('terminos') ? 'checked' : '' }}>
                    Acepto los Términos y Condiciones
                </label>
            </div>

            <button type="submit">Iniciar Sesion</button>
        </form>

        <a href="{{ route('formulario.create') }}" class="yaCuenta">¿No tienes cuenta? Registrate</a>
    </div>
</body>
</html>
