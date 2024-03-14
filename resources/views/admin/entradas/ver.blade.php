<?php
/** @var \App\Models\Entrada $entrada */
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Etiqueta[] $etiquetas */
?>
@extends('layouts.main')

@section('title', $entrada->titulo)

@section('main')
<section id="detalle-entrada" class="container">
    <div class="row">
        <div class="col-lg-5">
            @if($entrada->img != null && Storage::disk('public')->has('img/' . $entrada->img))
            <img src="{{ Storage::disk('public')->url('img/' . $entrada->img) }}" class="img-fluid rounded-start" alt="{{ $entrada->img_descripcion }}">
            @else
            <img src="{{ Storage::disk('public')->url('img/img-default.jpg') }}" class="img-fluid rounded-start" alt="No hay una imagen cargada.">
            @endif
        </div>
        <div class="col-lg-7">
            @foreach($entrada->etiquetas as $etiqueta)
            <span class="badge text-bg-primary">{{$etiqueta->nombre}}</span>
            @endforeach
            <h1>{{ $entrada->titulo }}</h1>
            <p>
                <svg xmlns="http://www.w3.org/2000/svg" width="12.8" height="12.8" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                    <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                </svg>
                {{ $entrada->fecha_publicacion }}
            </p>
            <p>{{ $entrada->intro }}</p>
            <p>{{ $entrada->sinopsis }}</p>
            <p>{{ $entrada->cuerpo }}</p>
        </div>
    </div>
</section>
@endsection