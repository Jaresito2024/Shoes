<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Usuarios - Lista</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h1>Lista de Usuarios</h1>
            <a href="{{ route('formulario.create') }}" class="btn btn-primary">Agregar Usuario</a>
            <a href="{{ route('zapatos.index') }}" class="btn btn-secondary">Ver Zapatos</a>
            <a href="{{ route('tienda.index') }}" class="btn btn-secondary">Volver a la Tienda</a>
        </div>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if($usuarios->count())
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Email</th>
                        <th>Ciudad</th>
                        <th>País</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($usuarios as $usuario)
                        <tr>
                            <td>{{ $usuario->id }}</td>
                            <td>{{ $usuario->nombre }}</td>
                            <td>{{ $usuario->apellido_paterno }}</td>
                            <td>{{ $usuario->apellido_materno }}</td>
                            <td>{{ $usuario->email }}</td>
                            <td>{{ $usuario->ciudad }}</td>
                            <td>{{ $usuario->pais }}</td>
                            <td>{{ $usuario->telefono }}</td>
                            <td class="d-flex gap-1">
                                <a href="{{ route('formulario.edit', $usuario) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('formulario.destroy', $usuario->id) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este usuario?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>


        @else
            <div class="alert alert-info">No hay usuarios registrados.</div>
        @endif
    </div>
</body>
</html>

