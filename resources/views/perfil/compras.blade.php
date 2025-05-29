@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Mis Compras</h2>

    @if($compras->isEmpty())
        <p>No has realizado ninguna compra aún.</p>
    @else
        <table class="table">
            <thead>
                <tr>
                    <th>Producto</th>
                    <th>Precio Unitario</th>
                    <th>Unidades Compradas</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($compras as $compra)
                    <tr>
                        <td>{{ $compra->zapato->nombre }}</td>
                        <td>${{ number_format($compra->zapato->precio, 2) }}</td>
                        <td>{{ $compra->cantidad_total }}</td>
                        <td>${{ number_format($compra->cantidad_total * $compra->zapato->precio, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection
