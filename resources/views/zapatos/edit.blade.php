<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Zapato</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1>Editar Zapato</h1>
        <form action="{{ route('zapatos.update', $zapato) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $zapato->nombre }}" required>
            </div>
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" required>{{ $zapato->descripcion }}</textarea>
            </div>
            <div class="mb-3">
                <label for="talla" class="form-label">Talla</label>
                <input type="text" class="form-control" id="talla" name="talla" value="{{ $zapato->talla }}" required>
            </div>
            <div class="mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="text" class="form-control" id="color" name="color" value="{{ $zapato->color }}" required>
            </div>
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" value="{{ $zapato->precio }}" required step="0.01">
            </div>
            <div class="mb-3">
                <label for="cantidad" class="form-label">Cantidad en Stock</label>
                <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{ $zapato->cantidad }}" required>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <input type="text" class="form-control" id="categoria" name="categoria" value="{{ $zapato->categoria }}" required>
            </div>
            <div class="form-check mb-3">
                <input class="form-check-input" type="checkbox" name="destacado" id="destacado"
                    {{ $zapato->destacado ? 'checked' : '' }}>
                <label class="form-check-label" for="destacado">
                    Destacar este zapato (mostrar en el carrusel)
                </label>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Zapato</button>
        </form>
    </div>
</body>
</html>
