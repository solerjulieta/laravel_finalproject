@extends('layouts.main')

@section('title', 'Página no encontrada')

@section('main')
<picture>
    <source media="(max-width:576px)" srcset="{{ Storage::disk('public')->url('img/mb-portada-404.jpg') }}">
    <source media="(max-width:768px)" srcset="{{ Storage::disk('public')->url('img/tb-portada-404.jpg') }}">
    <img src="{{ Storage::disk('public')->url('img/portada-404.jpg') }}" class="card-img-top" alt="Página no encontrada">
</picture>
<section id="pag-404" class="container">
    <h1>Página no encontrada</h1>
    <p>UPS! La página no existe.</p>
    <p>Parece que la página que estás intentando acceder no existe. ¡No te preocupes! A continuación te dejamos algunos links que te pueden ser de utilidad.</p>
    <ul>
        <li>
            <a href="{{ route('cursos') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                </svg>
                Ver Cursos
            </a>
        </li>
        <li>
            <a href="{{ route('blog') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                </svg>
                Blog
            </a>
        </li>
        <li>
            <a href="{{ route('inicio') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                </svg>
                Inicio
            </a>
        </li>
        <li>
            <a href="{{ route('sobre-nosotros') }}">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
                </svg>
                Sobre nosotros
            </a>
        </li>
    </ul>
</section>
@endsection
