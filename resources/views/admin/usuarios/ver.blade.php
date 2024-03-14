<?php
/** @var \App\Models\Usuario $usuario */
/** @var \App\Models\Inscripcion $inscripciones */
?>
@extends('layouts.main')

@section('title', 'Detalle de usuario')

@section('main')
<section id="detalle-usuario" class="container">
    <a href="{{ route('admin.usuarios.inicio') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
        </svg>
        Volver
    </a>
    <h1 class="mt-3">{{ $usuario->nombre }} {{ $usuario->apellido }}</h1>
    <ul>
        <li><b>Nombre:</b> {{ $usuario->nombre }}</li>
        <li><b>Apellido:</b> {{ $usuario->apellido }}</li>
        <li><b>Usuario creado desde:</b> {{ $usuario->created_at }}</li>
        <li><b>Email:</b> {{ $usuario->email }}</li>
        <li>
            <b>Rol:</b> 
            @if ($usuario->rol_id === 1)
                Administrador
            @else
                Usuario
            @endif
        </li>
        <li>
            <b>Curso/s contratado/s:</b>
           @if($inscripciones->isNotEmpty())
            <ul id="cursos-cards">
                @foreach ($inscripciones as $inscripcion)
                <li class="card shadow">
                    <h2>{{ $inscripcion->curso }}</h2>
                    <ul>
                        <li>
                            Compra realizada el: {{ $inscripcion->created_at }}
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-wallet2" viewBox="0 0 16 16">
                                <path d="M12.136.326A1.5 1.5 0 0 1 14 1.78V3h.5A1.5 1.5 0 0 1 16 4.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 13.5v-9a1.5 1.5 0 0 1 1.432-1.499L12.136.326zM5.562 3H13V1.78a.5.5 0 0 0-.621-.484L5.562 3zM1.5 4a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"/>
                            </svg>
                            Costo: ${{ $inscripcion->precio }}
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar4" viewBox="0 0 16 16">
                                <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z"/>
                            </svg>
                            Fecha de inicio: {{ $inscripcion->fecha_inicio }}
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                            </svg>
                            Horario: {{ $inscripcion->horario->dias->nombre }} de {{ $inscripcion->horario->horas->ingreso }} a {{ $inscripcion->horario->horas->egreso }}hs.
                        </li>
                        <li>
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-laptop" viewBox="0 0 16 16">
                                <path d="M13.5 3a.5.5 0 0 1 .5.5V11H2V3.5a.5.5 0 0 1 .5-.5h11zm-11-1A1.5 1.5 0 0 0 1 3.5V12h14V3.5A1.5 1.5 0 0 0 13.5 2h-11zM0 12.5h16a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5z"/>
                            </svg>
                            Modalidad: {{ $inscripcion->modalidad->nombre }}
                        </li>
                    </ul>
                </li>
                @endforeach
            </ul>
            @else
            No se ha inscripto a ningún curso.
            @endif
        </li>
    </ul>
</section>
@endsection