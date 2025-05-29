<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda de Zapatos</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/buscador.js') }}"></script>
    <script src="{{ asset('js/modo-oscuro.js') }}"></script>

    <!-- CSS Personalizado -->
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/tienda.css') }}" rel="stylesheet">
</head>
<body>
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom shadow-sm px-3 py-2">
        <div class="container-fluid">
            <!-- Logo o nombre de tienda -->
            <a class="navbar-brand fw-bold" href="{{ route('tienda.index') }}">👟 Shoes</a>

            <!-- Botón toggle para dispositivos móviles -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Enlaces -->
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tienda.categorias') }}">Categorías</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('tienda.bestsellers') }}">Lo más vendido</a>
                    </li>
                </ul>

                <!-- Buscador -->
                <form class="d-flex position-relative" onsubmit="return false;">
                    <input type="text" name="buscador" class="form-control me-2" placeholder="Buscar zapatos...">
                    <ul id="resultados" class="list-group position-absolute w-100" style="z-index: 999;"></ul>
                </form>

                <!-- Opciones de usuario -->
                <ul class="navbar-nav mb-2 mb-lg-0">
                    @if(!$usuario_logueado)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('formulario.login') }}">Iniciar Sesión</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('formulario.create') }}">Registrarse</a>
                        </li>
                    @endif
                    @if($usuario_logueado)
                        <li class="nav-item dropdown position-relative">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button">
                                {{ $usuario_logueado->nombre }}
                            </a>
                            <ul class="dropdown-menu show" aria-labelledby="userDropdown" style="display: none; position: absolute; top: 100%; left: 0; z-index: 1000;">
                                <li>
                                    <a class="dropdown-item" href="{{ route('tienda.carrito') }}">
                                        <i class=""></i> 🛒Carrito
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('perfil.compras') }}">
                                        <i class=""></i> 🛍️Compras realizadas
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('formulario.logout') }}">
                                        <i class=""></i> 🚪Cerrar sesión
                                    </a>
                                </li>
                            </ul>
                        </li>
                    @endif

                    @if(Auth::check())
                        <a class="dropdown-item" href="{{ route('tienda.carrito') }}">
                            <i class="bi bi-cart"></i> Carrito
                        </a>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    {{-- Contenido principal --}}
    <main class="container mt-4">
        @yield('content')
    </main>

    <!-- FOOTER -->
    <footer class="bg-dark text-white text-center py-4">
        <p>&copy; 2025 👟Shoes. Todos los derechos reservados.</p>
    </footer>

    {{-- Scripts Bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/menu-user.js') }}"></script>
    
</body>
</html>
