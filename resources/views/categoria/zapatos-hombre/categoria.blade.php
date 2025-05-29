@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="text-center mb-4">Categoría: {{ ucfirst($nombre) }}</h2>
    <div class="row">
        @forelse($productos as $zapato)
        <div class="col-md-4">
            <div class="card mb-4">
                <img src="{{ asset('storage/' . $zapato->imagen) }}" class="card-img-top" alt="{{ $zapato->nombre }}">
                <div class="card-body">
                    <h5 class="card-title">{{ $zapato->nombre }}</h5>
                    <p class="card-text">{{ $zapato->descripcion }}</p>
                    <p class="card-text">${{ $zapato->precio }}</p>
                    <a href="#" class="btn btn-primary">Ver más</a>
                </div>
            </div>
        </div>
        @empty
            <p>No hay productos en esta categoría.</p>
        @endforelse
    </div>
</div>
@endsection
