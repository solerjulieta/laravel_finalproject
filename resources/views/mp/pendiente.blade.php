@extends('layouts.main')

@section('title', 'Pago pendiente')

@section('main')
<section id="mp-msj" class="container">
    <h1>Pago pendiente...</h1>
    <p>Tu pago quedó pendiente.</p>
    <p>Envianos tu comprobante de pago por email: <a href="mailto:tesoreria@quickourses.com.ar">tesoreria@quickourses.com.ar</a></p>
    <p>Una vez recibido el pago, podrás ingresar a tu perfil académico. Te estaremos notificando por email el alta.</p>
    <p>¡Gracias por elegirnos!</p>
    <a href="{{ route('inicio') }}">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-right-short" viewBox="0 0 16 16">
            <path fill-rule="evenodd" d="M4 8a.5.5 0 0 1 .5-.5h5.793L8.146 5.354a.5.5 0 1 1 .708-.708l3 3a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708-.708L10.293 8.5H4.5A.5.5 0 0 1 4 8z"/>
        </svg>
        Volver al inicio
    </a>
</section>
@endsection