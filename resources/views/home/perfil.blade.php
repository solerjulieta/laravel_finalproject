<?php
/** @var \App\Models\Usuario $usuario */
/** @var \Illuminate\Support\ViewErrorBag $errors */
?>
@extends('layouts.main')

@section('title', "Mi perfil")

@section('main')
<section class="container">
    <h1>Mi perfil</h1>
    <div id="perfil">
        <article class="col-lg-4">
            <h2>Información Personal</h2>
            <form action="{{ route('editarInfoPersonal', ['id' => $usuario->usuario_id]) }}" method="post">
                @csrf
                <div class="form-floating mb-3 col-lg-5">
                    <input 
                    type="text" 
                    class="form-control" 
                    id="nombre"
                    name="nombre"
                    value="{{ old('nombre', $usuario->nombre) }}"
                    @error('error-nombre') aria-describedby="error-nombre" @enderror
                    >
                    <label for="nombre">Nombre</label>
                    @error('nombre')
                        <p id="error-nombre">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-floating mb-3 col-lg-5">
                    <input 
                    type="text" 
                    class="form-control" 
                    id="apellido"
                    name="apellido"
                    value="{{ old('apellido', $usuario->apellido) }}"
                    @error('error-apellido') aria-describedby="error-apellido" @enderror
                    >
                    <label for="apellido">Apellido</label>
                    @error('apellido')
                        <p id="error-apellido">{{ $message }}</p>
                    @enderror  
                </div>
                <button type="submit" class="btn btn-blue">Guardar cambios</button>
            </form>
        </article>
        <article>
            <h2>Apariencia</h2>
            <p>Agregá tu foto de perfil y contanos sobre vos para que tus profesores y compañeros puedan conocerte.</p>
            <div id="apariencia">
                <form action="{{ route('editarApariencia', ['id' => $usuario->usuario_id]) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" id="usuario_id" name="usuario_id" value="{{ $usuario->usuario_id }}">
                    <div id="foto-perfil" class="mb-3">
                        @if($usuario->perfil)
                            @if ($usuario->perfil->avatar && Storage::disk('public')->has('img/' . $usuario->perfil->avatar))
                                <img src="{{ Storage::disk('public')->url('img/' . $usuario->perfil->avatar) }}" alt="{{ $usuario->nombre }}">
                            @else
                                <img src="{{ Storage::disk('public')->url('img/perfil-default.jpg') }}" alt="Sin imagen de perfil">
                            @endif
                        @else
                            <img src="{{ Storage::disk('public')->url('img/perfil-default.jpg') }}" alt="Sin imagen de perfil">
                        @endif
                        <div class="mb-3 col-lg-4">
                            <label for="avatar">Imagen de perfil</label>
                            <input 
                                type="file"
                                id="avatar"
                                name="avatar"
                                class="form-control"
                            >
                        </div>
                    </div>
                    <div class="mb-3 col-lg-7">
                        <label for="bio">Contá algo sobre vos</label>
                        <textarea 
                            name="bio" 
                            id="bio"
                            class="form-control"
                        >@if($usuario->perfil){{ old('bio', $usuario->perfil->bio) }}@endif</textarea>
                    </div>
                    <button type="submit" class="btn btn-blue">Guardar cambios</button>
                </form>
            </div>
        </article>
    </div>
</section>
@endsection