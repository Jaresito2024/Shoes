@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-6 mb-4">
            <div class="bg-white shadow-lg rounded p-4 text-center">
                <img src="{{ asset('storage/' . $zapato->imagen) }}" alt="{{ $zapato->nombre }}" class="img-fluid rounded" style="max-height: 400px; object-fit: cover;">
            </div>
        </div>

        <div class="col-md-6">
            <div class="bg-white shadow-lg rounded p-5">
                <h2 class="mb-3">{{ $zapato->nombre }}</h2>

                <p class="text-muted mb-2"><strong>Precio:</strong> <span class="text-success fs-4">${{ $zapato->precio }}</span></p>
                <p class="mb-2"><strong>Talla:</strong> {{ $zapato->talla }}</p>
                <p class="mb-4"><strong>Color:</strong> {{ $zapato->color }}</p>

                <form method="POST" action="{{ route('comprar.zapato', $zapato->id) }}">
                    @csrf
                    <input type="hidden" name="zapato_id" value="{{ $zapato->id }}">
                    <button type="submit" class="btn btn-primary btn-lg w-100 mb-3">
                        🛒 Agregar al Carrito
                    </button>
                </form>

                <a href="{{ route('tienda.index') }}" class="btn btn-outline-secondary w-100">← Volver a la tienda</a>
            </div>
        </div>
    </div>
</div>
@endsection
