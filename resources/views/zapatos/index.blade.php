<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Zapatos - Lista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Lista de Zapatos</h1>

        <a href="{{ route('zapatos.create') }}" class="btn btn-primary mb-3">Agregar Zapato</a>
        <a href="{{ route('formulario.index') }}" class="btn btn-primary mb-3">Ver Usuarios</a>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif


        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Talla</th>
                    <th>Color</th>
                    <th>Precio</th>
                    <th>Cantidad</th>
                    <th>Categoría</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($zapatos as $zapato)
                    <tr>
                        <td>{{ $zapato->id }}</td>
                        <td>{{ $zapato->nombre }}</td>
                        <td>{{ $zapato->talla }}</td>
                        <td>{{ $zapato->color }}</td>
                        <td>${{ $zapato->precio }}</td>
                        <td>{{ $zapato->cantidad }}</td>
                        <td>{{ $zapato->categoria }}</td>
                        <td>
                            <img src="{{ asset('storage/' . $zapato->imagen) }}" width="150" />
                        </td>
                        <td>
                            <a href="{{ route('zapatos.show', $zapato) }}" class="btn btn-info btn-sm">Ver Detalles</a>
                            <a href="{{ route('zapatos.edit', $zapato) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('zapatos.destroy', $zapato) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button onclick="return confirm('¿Seguro que deseas eliminar este zapato?')" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        
                        </td>

                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>
