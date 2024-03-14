<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var \App\Models\Entrada $entrada */
?>
@extends('layouts.main')

@section('title', 'Editar ' . $entrada->titulo)

@section('main')
<section class="container admin">
    <a href="{{ route('admin.entradas.inicio') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
        </svg>
        Volver
    </a>
    <h1 class="mt-3">Editar: {{ $entrada->titulo }}</h1>
    <p>Editá los datos de la entrada en el siguiente formulario. Para guardar los cambios hacé click en "Actualizar".</p>
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
    <form action="{{route('admin.entradas.editar', ['id' => $entrada->entrada_id])}}" method="post" enctype="multipart/form-data" class="row form-admin">
        @csrf
        <div class="mb-3 col-lg-10">
            <label for="titulo">Título <span class="opcional">*Debe contener al menos 5 caracteres.</span></label>
            <input 
                type="text" 
                id="titulo" 
                name="titulo" 
                class="form-control"
                value="{{ old('titulo', $entrada->titulo) }}"
                @error('titulo') aria-describedby="error-titulo" @enderror
            >
            @error('titulo')
                <p id="error-titulo">{{ $message }}</p>
            @enderror
        </div>
        <fieldset class="mb-3 col-lg-10">
            <legend>Etiquetas <span class="opcional">(Opcional)</span></legend>
            @foreach($etiquetas as $etiqueta)
            <div class="form-check form-check-inline">
                <input 
                    type="checkbox" 
                    class="form-check-input" 
                    id="etiqueta-{{ $etiqueta->etiqueta_id }}"
                    name="etiquetas[]"
                    value="{{ $etiqueta->etiqueta_id }}"
                    @checked(in_array($etiqueta->etiqueta_id, old('etiquetas', $entrada->getEtiquetasId())))
                >
                <label for="etiqueta-{{ $etiqueta->etiqueta_id }}" class="form-check-label">{{ $etiqueta->nombre }}</label>
            </div>
            @endforeach
        </fieldset>
        <div class="mb-3 col-lg-10">
            <label for="intro">Intro <span class="opcional">*Debe contener al menos 20 caracteres.</span></label>
            <textarea 
                name="intro" 
                id="intro" 
                class="form-control"
                @error('intro') aria-describedby="error-sinopsis" @enderror
            >{{ old('intro', $entrada->intro) }}</textarea>
            @error('intro')
                <p id="error-sinopsis">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3 col-lg-10">
            <label for="sinopsis">Sinopsis <span class="opcional">*Debe contener al menos 50 caracteres.</span></label>
            <textarea 
                name="sinopsis" 
                id="sinopsis" 
                class="form-control"
                @error('sinopsis') aria-describedby="error-sinopsis" @enderror
            >{{ old('sinopsis', $entrada->sinopsis) }}</textarea>
            @error('sinopsis')
                <p id="error-sinopsis">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3 col-lg-10">
            <label for="cuerpo">Cuerpo <span class="opcional">*Debe contener al menos 100 caracteres.</span></label>
            <textarea 
                name="cuerpo" 
                id="cuerpo" 
                cols="30" 
                rows="10" 
                class="form-control"
                @error('cuerpo') aria-describedby="error-cuerpo" @enderror
            >{{ old('cuerpo', $entrada->cuerpo) }}</textarea>
            @error('cuerpo')
                <p id="error-cuerpo">{{ $message }}</p>
            @enderror
        </div>
        <div id="img-info" class="info-img col-lg-10">
            @if($entrada->img != null && Storage::disk('public')->has('img/' . $entrada->img))
                <p>Imagen Actual:</p>
                <img src="{{ Storage::disk('public')->url('img/' . $entrada->img) }}" alt="{{ $entrada->img_descripcion }}">
                <p class="visually-hidden">Hay una imagen incluída.</p>
                <p>Si querés mantener esta foto, simplemente dejá el campo para subir imagen vacío.</p>
            @else
                <p>Actualmente no hay ninguna imagen cargada.</p>
                <img src="{{ Storage::disk('public')->url('img/img-default.jpg') }}" class="img-fluid rounded-start" alt="No hay una imagen cargada.">
            @endif
        </div>
        <div class="mb-3 col-lg-5">
            <label for="img">Imagen <span class="opcional">(Opcional)</span></label>
            <input 
                type="file" 
                id="img" 
                name="img" 
                class="form-control"
                aria-describedby="img-info"
            >
        </div>
        <div class="mb-3 col-lg-5">
            <label for="img_descripcion">Descripción de imagen <span class="opcional">(Opcional)</span></label>
            <input 
                type="text" 
                id="img_descripcion" 
                name="img_descripcion" 
                class="form-control"
                value="{{ old('img_descripcion', $entrada->img_descripcion) }}"
            >
        </div>
        <button type="submit" class="btn btn-blue col-lg-3">Actualizar</button>
    </form>
</section>
@endsection