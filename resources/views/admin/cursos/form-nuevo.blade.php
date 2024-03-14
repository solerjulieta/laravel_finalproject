<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Duracion[] $duraciones */
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Modalidad[] $modalidades */
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Objetivo[] $objetivos */
?>
@extends('layouts.main')

@section('title', 'Agregar un nuevo curso')

@section('main')
<section class="container admin">
    <a href="{{ route('admin.cursos.inicio') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
        </svg>
        Volver
    </a>
    <h1 class="mt-3">Agregar un nuevo curso</h1>
    <p>Completá los siguientes datos del formulario para publicar un nuevo curso.</p>
    @if($errors->any())
    <div id="alert" class="container">
        <div class="row">
          <div class="col-lg-5 col-md-8 alert alert-danger alert-dismissible fade show" role="alert">
            Hay errores en el formulario. Por favor, revisá los datos e intentá nuevamente.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        </div>
    </div>
    @endif
    <form action="{{ route('admin.cursos.publicar') }}" method="post" enctype="multipart/form-data" class="row form-admin">
        @csrf
        <div class="mb-3 col-lg-5">
            <label for="nombre">Nombre <span class="opcional">*Debe contener al menos 5 caracteres.</span></label>
            <input 
                type="text"
                id="nombre"
                name="nombre"
                class="form-control"
                value="{{ old('nombre') }}"
                @error('nombre') aria-describedby="error-nombre" @enderror
            >
            @error('nombre')
                <p id="error-nombre">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3 col-lg-5">
            <label for="precio">Precio</label>
            <input 
                type="text"
                id="precio"
                name="precio"
                class="form-control"
                value="{{ old('precio') }}"
                @error('precio') aria-describedby="error-precio" @enderror
            >
            @error('precio')
                <p id="error-precio">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3 col-lg-10">
            <label for="descripcion">Descripción <span class="opcional">*Debe contener al menos 20 caracteres.</span></label>
            <textarea 
                name="descripcion" 
                id="descripcion"
                class="form-control"
                @error('descripcion') aria-describedby="error-descripcion" @enderror
            >{{ old('descripcion') }}</textarea>
            @error('descripcion')
                <p id="error-descripcion">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3 col-lg-5">
            <label for="fecha_inicio">Fecha de inicio</label>
            <input 
                type="date"
                id="fecha_inicio"
                name="fecha_inicio"
                class="form-control"
                value="{{ old('fecha_inicio') }}"
                @error('fecha_inicio') aria-describedby="fecha_inicio" @enderror
            >
            @error('fecha_inicio')
                <p id="error-fecha_inicio">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3 col-lg-5">
            <label for="duracion_id">Duración</label>
            <select 
                name="duracion_id" 
                id="duracion_id"
                class="form-select"
                @error('duracion_id') aria-describedby="duracion_id" @enderror
            >
                @foreach ($duraciones as $duracion)
                    <option 
                        value="{{ $duracion->duracion_id }}"
                        @selected($duracion->duracion_id == old('duracion_id'))
                    >
                    {{ $duracion->duracion }}
                    </option>
                @endforeach
            </select>
            @error('duracion_id')
                <p id="error-duracion_id">{{ $message }}</p>
            @enderror
        </div>
        <fieldset class="mb-3 col-lg-10">
            <legend>Modalidad</legend>
            @foreach ($modalidades as $modalidad)
                <div class="form-check form-check-inline">
                    <input 
                        type="checkbox"
                        class="form-check-input"
                        id="modalidad-{{ $modalidad->modalidad_id }}"
                        name="modalidades[]"
                        value="{{ $modalidad->modalidad_id }}"
                        @checked(old('modalidades') !== null && in_array($modalidad->modalidad_id, old('modalidades')))
                    >
                    <label for="modalidad-{{ $modalidad->modalidad_id }}" class="form-check-label">{{ $modalidad->nombre }}</label>
                </div>
            @endforeach
        </fieldset>
        <fieldset class="mb-3 col-lg-10">
            <legend>Horarios</legend>
            @foreach ($horarios as $horario)
                <div class="form-check form-check-inline">
                    <input 
                        type="checkbox"
                        class="form-check-input"
                        id="horario-{{ $horario->horario_id }}"
                        name="horarios[]"
                        value="{{ $horario->horario_id }}"
                        @checked(old('horarios') !== null && in_array($horario->horario_id, old('horarios')))
                    >
                    <label for="horario-{{ $horario->horario_id }}" class="form-check-label">{{ $horario->dias->nombre }} de {{ $horario->horas->ingreso }} a {{ $horario->horas->egreso }}hs.</label>
                </div>
            @endforeach
        </fieldset>
        <fieldset class="mb-3 col-lg-10">
            <legend>Objetivos</legend>
            @foreach ($objetivos as $objetivo)
            <div class="form-check">
                <input 
                    type="checkbox"
                    class="form-check-input"
                    id="objetivo-{{ $objetivo->objetivo_id }}"
                    name="objetivos[]"
                    value="{{ $objetivo->objetivo_id }}"
                    @checked(old('objetivos') !== null && in_array($objetivo->objetivo_id, old('objetivos')))
                >
                <label for="objetivo-{{ $objetivo->objetivo_id }}" class="form-check-label">{{ $objetivo->objetivo }}</label>
            </div>
            @endforeach
        </fieldset>
        <div class="mb-3 col-lg-5">
            <label for="portada">Portada <span class="opcional">(Opcional)</span></label>
            <input 
                type="file"
                id="portada"
                name="portada"
                class="form-control"
            >
        </div>
        <div class="mb-3 col-lg-5">
            <label for="portada_descripcion">Descripción de la portada <span class="opcional">(Opcional)</span></label>
            <input 
                  type="text" 
                  id="portada_descripcion" 
                  name="portada_descripcion" 
                  class="form-control"
                  value="{{ old('portada_descripcion') }}"
            >
        </div>
        <div class="mb-3 col-lg-5">
            <label for="img">Imagen <span class="opcional">(Opcional)</span></label>
            <input 
                type="file" 
                id="img" 
                name="img" 
                class="form-control"
            >
        </div>
        <div class="mb-3 col-lg-5">
            <label for="img_descripcion">Descripción de imagen <span class="opcional">(Opcional)</span></label>
            <input 
                type="text" 
                id="img_descripcion" 
                name="img_descripcion" 
                class="form-control"
                value="{{ old('img_descripcion') }}"
            >
        </div>
        <button type="submit" class="btn btn-blue col-lg-3">Publicar</button>
    </form>
</section>
@endsection