<?php
/** @var \App\Models\Inscripcion $inscripciones */
?>
@extends('layouts.main')

@section('title', 'Mis cursos')

@section('main')
<section id="mis-cursos" class="container">
    <h1>Mis cursos</h1>
    @if($inscripciones->isEmpty())
    <p>Aún no te has inscripto en ningún curso.</p>
    <p>Enterate sobre nuestros cursos <a href="{{ route('cursos') }}">ingresando aquí</a>.</p>
    @else
    <ul id="cursos-cards">
        @foreach ($inscripciones as $inscripcion)
            <li class="card shadow">
                <h2>{{ $inscripcion->curso }}</h2>
                <ul>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar4" viewBox="0 0 16 16">
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z"/>
                        </svg>
                        Fecha de inicio: {{ $inscripcion->fecha_inicio }}
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                            <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z"/>
                        </svg>
                        Modalidad: {{ $inscripcion->modalidad->nombre }}
                    </li>
                    <li>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                        </svg>
                        Horario: {{ $inscripcion->horario->dias->nombre }} de {{ $inscripcion->horario->horas->ingreso }} a {{ $inscripcion->horario->horas->egreso }}hs.
                    </li>
                    <li class="btns">
                        <a href="{{ route('confirmarBaja', ['id' => $inscripcion->inscripcion_id]) }}">Cancelar inscripción</a>
                        <a href="{{ route('formAdministrar', ['id' => $inscripcion->inscripcion_id ]) }}">Administrar</a>
                    </li>
                </ul>
            </li>
        @endforeach
    </ul>
    @endif
</section>
@endsection