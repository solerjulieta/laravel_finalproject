<?php
/** @var \App\Models\Curso $curso */
?>
@extends('layouts.main')

@section('title', $curso->nombre)

@section('main')
<picture id="img-cdetalle">
    @if($curso->portada != null && Storage::disk('public')->has('img/' . $curso->portada))
        <source media="(max-width:576px)" srcset="{{ Storage::disk('public')->url('img/mb-' . $curso->portada) }}">
        <source media="(max-width:768px)" srcset="{{ Storage::disk('public')->url('img/tb-' . $curso->portada) }}">
        <img src="{{ Storage::disk('public')->url('img/' . $curso->portada) }}" class="card-img-top" alt="{{ $curso->portada_descripcion }}">
    @else
        <source media="(max-width:576px)" srcset="{{ Storage::disk('public')->url('img/mb-portada-default.jpg') }}">
        <source media="(max-width:768px)" srcset="{{ Storage::disk('public')->url('img/tb-portada-default.jpg') }}">
        <img src="{{ Storage::disk('public')->url('img/portada-default.jpg') }}" class="card-img-top" alt="No hay una imagen cargada.">
    @endif
</picture>
<section id="detalle-curso" class="container">
    <span>Curso</span>
    <h1>{{ $curso->nombre }}</h1>
    <p>{{ $curso->descripcion }}</p>
    <div class="row info-objetivos">
        <div class="col-lg-4 info-util">
            <h2>Info útil</h2>
            <ul>
                <li><span class="negrita">Inicio:</span> {{ $curso->fecha_inicio }}</li>
                <li><span class="negrita">Duración:</span> {{ $curso->duracion->duracion }}</li>
                <li><span class="negrita">Modalidad:</span>
                    <ul>
                        @foreach ($curso->modalidades as $modalidad)
                            <li>{{ $modalidad->nombre }}</li>
                        @endforeach
                    </ul>
                </li>
                <li><span class="negrita">Horarios</span>
                    <ul>
                        @foreach ($curso->horarios as $horario)
                            <li>{{ $horario->dias->nombre }} de {{ $horario->horas->ingreso }} a {{ $horario->horas->egreso }}hs.</li>
                        @endforeach
                    </ul>
                </li>
                <li><span class="negrita">Precio:</span> ${{ $curso->precio }}</li>
            </ul>
            <a href="mailto:info@quickourses.com.ar" class="btn btn-outline-blue">Consultar</a>
        </div>
        <div class="col-lg-8 objetivos">
            <h2>Objetivos</h2>
            <ul>
                @foreach ($curso->objetivos as $objetivo)
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                        </svg> 
                        {{ $objetivo->objetivo }}
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
    @auth
    @if($usuarioInscripto)
    <p>Ya estás inscripto a este curso.</p>
    <a href="{{ route('misCursos') }}" class="btn btn-blue">Ir a mis cursos</a>
    @else
    <form action="{{ route('mp.compra', ['id' => $curso->curso_id]) }}">
        @csrf
        <div class="mb-3 col-lg-4">
            <label for="modalidad_id">Modalidad</label>
            <select 
                name="modalidad_id" 
                id="modalidad_id"
                class="form-select"
            >
            @foreach ($curso->modalidades as $modalidad)
                <option value="{{ $modalidad->modalidad_id }}">
                    {{ $modalidad->nombre }}
                </option>
            @endforeach
            </select>
        </div>
        <div class="mb-3 col-lg-4">
            <label for="horario_id">Horario</label>
            <select 
                name="horario_id" 
                id="horario_id"
                class="form-select"
            >
            @foreach ($curso->horarios as $horario)
                <option 
                    value="{{ $horario->horario_id }}"
                >
                    {{ $horario->dias->nombre }} de {{ $horario->horas->ingreso }} a {{ $horario->horas->egreso }}hs.
                </option>
            @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-blue">Inscribirme</button>
    </form>
    @endif
    @elseguest
    <span class="txt-info">Para poder inscribirte debés <a href="{{ route('auth.formRegistro') }}">registrarte</a> o <a href="{{ route('auth.formLogin') }}">iniciar sesión.</a></span>
    @endauth
</section>
@endsection