@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <div class="card shadow-lg border-0">
        <div class="card-header bg-dark text-white">
            <h3 class="mb-0">🛒 Carrito de Compras</h3>
        </div>
        <div class="card-body">
            @if(count($carrito) > 0)
                <div class="table-responsive">
                    <table class="table align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Producto</th>
                                <th scope="col">Precio</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($carrito as $item)
                                <tr>
                                    <td class="fw-semibold">{{ $item['nombre'] }}</td>
                                    <td>${{ number_format($item['precio'], 2) }}</td>
                                    <td>{{ $item['cantidad'] }}</td>
                                    <td>
                                        <form action="{{ route('carrito.eliminar', $item['id']) }}" method="POST" onsubmit="return confirm('¿Eliminar este producto del carrito?')">
                                            @csrf
                                            <button type="submit" class="btn btn-outline-danger btn-sm">🗑 Eliminar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <div class="d-flex justify-content-end gap-2 mt-4">
                    <form action="{{ route('carrito.comprar') }}" method="POST" onsubmit="return confirm('¿Confirmas la compra?')">
                        @csrf
                        <button type="submit" class="btn btn-success shadow-sm">✅ Comprar carrito</button>
                    </form>

                    <form action="{{ route('carrito.vaciar') }}" method="POST" onsubmit="return confirm('¿Vaciar todo el carrito?')">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger shadow-sm">🧹 Vaciar carrito</button>
                    </form>
                </div>
            @else
                <div class="alert alert-info text-center">
                    <strong>Tu carrito está vacío.</strong> ¡Empieza a agregar productos ahora!
                </div>
            @endif

            <div class="text-end mt-4">
                <a href="{{ route('tienda.index') }}" class="btn btn-primary">🛍 Seguir comprando</a>
            </div>
        </div>
    </div>
</div>

@endsection
