<?php
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Entrada[] $entradas */
/** @var array $buscarParametros */
?>
@extends('layouts.main')

@section('title', 'Blog')

@section('main')
<section class="container">
    <h1>El blog de QuicKourses</h1>
    <p>Encontrá todos los temas de tu interés.</p>
    <form action="{{ route('blog') }}" method="get" class="form-buscar col-lg-4">
        <div class="form-floating">
            <input type="search" id="b-titulo" name="titulo" class="form-control" value="{{ $buscarParametros['titulo'] ?? '' }}" placeholder="Buscar">
            <label for="b-titulo">Buscar</label>
        </div>
        <button id="buscar" type="submit" class="btn">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
            </svg>
        </button>
    </form>
</section>
<section id="blog" class="container">
    @if($sinResultados)
    <h2>No se encontraron resultados para tu búsqueda.</h2>
    @endif
    <ul id="entradas" class="row">
        @foreach($entradas as $entrada)
        <li class="card col-lg-3 col-md-4 shadow-sm">
            @if($entrada->img != null && Storage::disk('public')->has('img/' . $entrada->img))
            <img src="{{ Storage::disk('public')->url('img/' . $entrada->img) }}" class="img-fluid rounded-start" alt="{{ $entrada->img_descripcion }}">
            @else
            <img src="{{ Storage::disk('public')->url('img/img-default.jpg') }}" class="img-fluid rounded-start" alt="No hay una imagen cargada.">
            @endif
            <div>
                @foreach($entrada->etiquetas as $etiqueta)
                <span class="badge text-bg-primary">{{$etiqueta->nombre}}</span>
                @endforeach
            </div>
            <h2 class="card-title">{{ $entrada->titulo }}</h2>
            <p class="card-text">{{ $entrada->intro }}</p>
            <a href="{{ route('ver-entrada', ['id' => $entrada->entrada_id]) }}" class="btn btn-blue">Leer más</a>
        </li>
        @endforeach
    </ul>
    {{ $entradas->links() }}
</section>
@endsection