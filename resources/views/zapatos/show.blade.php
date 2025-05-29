<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalle del Zapato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Detalles del Zapato</h1>

        <div class="card">
            <div class="card-header">
                {{ $zapato->nombre }}
            </div>
            <div class="card-body">
                <p><strong>Descripción:</strong> {{ $zapato->descripcion }}</p>
                <p><strong>Talla:</strong> {{ $zapato->talla }}</p>
                <p><strong>Color:</strong> {{ $zapato->color }}</p>
                <p><strong>Precio:</strong> ${{ $zapato->precio }}</p>
                <p><strong>Cantidad:</strong> {{ $zapato->cantidad }}</p>
                <p><strong>Categoría:</strong> {{ $zapato->categoria }}</p>
                <img src="{{ asset('storage/' . $zapato->imagen) }}" width="200" />
            </div>
        </div>

        <a href="{{ route('tienda.index') }}" class="btn btn-primary mt-3">Volver</a>
    </div>
</body>
</html>
