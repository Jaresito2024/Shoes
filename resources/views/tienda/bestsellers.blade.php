@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">Zapatos más vendidos</h2>

    <div class="row">
        @foreach ($zapatos as $zapato)
            <div class="col-md-3 mb-4">
                <div class="card h-100">
                    <img src="{{ asset('storage/' . $zapato->imagen) }}" class="card-img-top" alt="{{ $zapato->nombre }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $zapato->nombre }}</h5>
                        <p class="card-text">Vendidos: {{ $zapato->compras_count }}</p>
                        <p class="card-text">Precio: ${{ $zapato->precio }}</p>
                        <a href="{{ route('tienda.preview', $zapato->id) }}" class="btn btn-primary">Ver más</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
