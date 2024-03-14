<?php
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Curso[] $cursos */
?>
@extends('layouts.main')

@section('title', 'Cursos')

@section('main')
<section id="cursos" class="container">
    <h1>Cursos</h1>
    <p>Elegí tu curso.</p>
    <ul>
        @foreach ($cursos as $curso)
        <li class="card shadow">
            @if($curso->img != null && Storage::disk('public')->has('img/' . $curso->img))
            <img src="{{ Storage::disk('public')->url('img/' . $curso->img) }}" class="card-img-top" alt="{{ $curso->img_descripcion }}">
            @else
            <img src="{{ Storage::disk('public')->url('img/curso-img-default.jpg') }}" class="card-img-top" alt="No hay una imagen cargada.">
            @endif
            <h2 class="card-title">{{ $curso->nombre }}</h2>
            <p>Fecha de inicio: {{ $curso->fecha_inicio }}</p>
            <a class="btn btn-blue" href="{{ route('ver-curso', ['id' => $curso->curso_id]) }}">Ver más</a>
        </li>
        @endforeach
    </ul>
</section>
@endsection