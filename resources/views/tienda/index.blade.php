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

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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
                    @if($usuario_logueado && $usuario_logueado->id == '1')
                        <li>
                            <a class="dropdown-item" href="{{ route('formulario.index') }}">
                                <i class="bi bi-pencil-square"></i> Formulario
                            </a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <!-- HERO / CARRUSEL -->
    <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <!-- Slide 1 -->
            <div class="carousel-item active">
                <img src="{{ asset('images/promocion1.jpg') }}" class="d-block w-100" alt="Promoción 1">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                    <h5>Bienvenido a Shoes</h5>
                    <p>Descubre los mejores zapatos a precios increíbles.</p>
                </div>
            </div>
            <!-- Slide 2 -->
            <div class="carousel-item">
                <img src="{{ asset('images/promocion2.jpg') }}" class="d-block w-100" alt="Promoción 2">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                    <h5>Nueva colección</h5>
                    <p>Encuentra tu estilo con nuestra línea 2025.</p>
                </div>
            </div>
            <!-- Slide 3 -->
            <div class="carousel-item">
                <img src="{{ asset('images/promocion3.jpg') }}" class="d-block w-100" alt="Promoción 3">
                <div class="carousel-caption d-none d-md-block bg-dark bg-opacity-50 rounded p-3">
                    <h5>Envío gratis</h5>
                    <p>En compras mayores a $999 MXN.</p>
                </div>
            </div>
        </div>
        <!-- Controles -->
        <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>

    <div class="row justify-content-center">
        @foreach($zapatos as $zapato)
            <div class="col-sm-6 col-md-4 col-lg-3 mb-4">
                <div class="card shadow-sm h-100">
                    <img src="{{ asset('storage/' . $zapato->imagen) }}" class="card-img-top img-fluid" alt="{{ $zapato->nombre }}">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-center">{{ $zapato->nombre }}</h5>
                        <p class="card-text text-muted text-center small">{{ $zapato->descripcion }}</p>
                        <p class="card-text fw-bold text-center text-success mb-3">${{ $zapato->precio }}</p>
                        <a href="{{ route('tienda.preview', $zapato) }}" class="btn btn-outline-primary mt-auto">
                            <i class="bi bi-eye"></i> Ver más
                        </a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- FOOTER -->
    <footer class="bg-dark text-white">
        <p>&copy; 2025 👟Shoes. Todos los derechos reservados.</p>
    </footer>

    <!-- JS de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('js/menu-user.js') }}"></script>

</body>
</html>
