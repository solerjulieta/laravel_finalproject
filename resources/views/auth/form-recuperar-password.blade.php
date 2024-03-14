@extends('layouts.main')

@section('title', 'Recuperar contraseña')

@section('main')
<section class="container">
    <h1>Recuperar contraseña</h1>
    <p>¿Olvidaste tu clave?</p>
    <p>Ingresá tu email en el siguiente formulario.</p>
    <p>Recibirás un correo electrónico con las instrucciones para poder generar una nueva contraseña.</p>
    <form action="{{ route('auth.recuperarPassword') }}" method="post">
        @csrf
        <div class="col-lg-4 col-md-8">
            <label for="email">Email</label>
            <input 
                type="email" 
                id="email" 
                name="email" 
                class="form-control"
                value="{{ old('email') }}"
                @error('error-email') aria-describedby="error-email" @enderror
            >
            @error('email')
                <p id="error-email">{{ $message }}</p>
            @enderror 
        </div>
        <button class="btn btn-blue col-lg-2 col-md-7 mt-3" type="submit">Recuperar contraseña</button>
    </form>
</section>
@endsection