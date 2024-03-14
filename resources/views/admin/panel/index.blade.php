@extends('layouts.main')

@section('title', 'Panel de administración')

@section('main')
<section id="panel-admin" class="container">
    <h1>Panel de Administración</h1>
    <p>¡Bienvenido!</p>
    <div id="panel-cards" class="group-card">
        <div class="card mb-3 border-qkinfo" style="width: 18rem;">
            <div class="card-body">
                <div class="card-titulo">
                    <h2 class="card-title">Curso con más inscripciones</h2>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16">
                        <path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"/>
                    </svg>
                </div>
                <p class="card-text">{{ $cursoConMasInscripciones->nombre }}</p>
                <p class="card-text">Total de inscripciones: {{ $cursoConMasInscripciones->inscripciones_count }}</p>
            </div>
        </div>
        <div class="card mb-3 border-qkinfo" style="width: 18rem;">
            <div class="card-body">
                <div class="card-titulo">
                    <h2 class="card-title">Mes con más inscripciones</h2>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar4" viewBox="0 0 16 16">
                        <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM2 2a1 1 0 0 0-1 1v1h14V3a1 1 0 0 0-1-1H2zm13 3H1v9a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5z"/>
                    </svg>
                </div>
                <p class="card-text">{{ $mesConMasInscripciones->month }}</p>
                <p class="card-text">Total de inscripciones: {{ $mesConMasInscripciones->inscripciones}} </p>
            </div>
        </div>
        <div class="card mb-3 border-qkinfo" style="width: 18rem;">
            <div class="card-body">
                <div class="card-titulo">
                    <h2 class="card-title">Curso con más bajas</h2>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-circle" viewBox="0 0 16 16">
                        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                    </svg>
                </div>
                @if ($cursoConMasBajas)
                <p class="card-text">{{ $cursoConMasBajas->nombre }}</p>
                <p class="card-text">Total de bajas: {{ $cursoConMasBajas->deleted_at_count }}</p> 
                @else
                <p>No hay bajas</p>   
                <p>Total de bajas: 0</p>
                @endif
            </div>
        </div>
        <div class="card mb-3" style="width: 18rem;">
            <div class="card-body">
                <div class="card-titulo">
                    <h2 class="card-title">Total Usuarios</h2>
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                        <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z"/>
                    </svg>
                </div>
                <p class="card-text">Inscriptos: {{ $usuariosIncriptos }} </p>
                <p class="card-text">Total registrados: {{ $usuariosRegistrados }}</p>
            </div>
        </div>
    </div>
    <div class="tabla-inscripciones col-lg-8">
        <h2>Cursos y total de inscripciones</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Curso</th>
                    <th>Total Inscripciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cursosPorInscripciones as $curso)
                <tr>
                    <td>{{ $curso->nombre }}</td>
                    <td>{{ $curso->inscripciones_count }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <a class="btn btn-blue" href="{{ route('admin.cursos.inicio') }}">
        Administrar cursos
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
        </svg>
    </a>
    <a class="btn btn-blue" href="{{ route('admin.entradas.inicio') }}">
        Administrar entradas
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
        </svg>
    </a>
    <a class="btn btn-blue" href="{{ route('admin.usuarios.inicio') }}">
        Administrar usuarios
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
        </svg>
    </a>
</section>
@endsection