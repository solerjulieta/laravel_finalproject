<?php
/** @var \App\Models\Inscripcion $inscripcion */
?>
@extends('layouts.main')

@section('title', $inscripcion->curso)

@section('main')
<section class="container admin">
    <a href="{{ route('misCursos') }}" class="mb-3">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
      </svg>
      Volver
    </a>
    <h1 class="mt-3">Dar de baja inscripción de curso: {{ $inscripcion->curso }}</h1>
    <p>Estás a punto de dar de baja tu inscripción al curso. ¿Estás seguro/a que querés confirmar la acción?</p>
    <div class="container card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            @if($inscripcion->cursoInscripto->img != null && Storage::disk('public')->has('img/' . $inscripcion->cursoInscripto->img))
            <img src="{{ Storage::disk('public')->url('img/' . $inscripcion->cursoInscripto->img) }}" class="img-fluid rounded-start" alt="{{ $inscripcion->cursoInscripto->img_descripcion }}">
            @else
            <img src="{{ Storage::disk('public')->url('img/img-default.jpg') }}" class="img-fluid rounded-start" alt="No hay una imagen cargada.">
            @endif
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h2 class="card-title">{{ $inscripcion->curso }}</h2>
              <p class="card-text">Fecha de inicio: {{ $inscripcion->fecha_inicio }}</p>
            </div>
          </div>
        </div>
    </div>
    <form id="form-eliminar" action="{{ route('baja', ['id' => $inscripcion->inscripcion_id]) }}" method="post">
    @csrf    
    <button type="submit" class="btn btn-danger">Aceptar</button>
    </form>
</section>
@endsection