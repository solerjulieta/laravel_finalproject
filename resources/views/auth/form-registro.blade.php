@extends('layouts.main')

@section('title', 'Registrarse')

@push('js')
<script src="../../../js/btn.password.js"></script>
@endpush

@section('main')
<section id="registro" class="container">
    <h1>Registrarse</h1>
    <p>Completá los siguientes datos del formulario para registrarte.</p>
    @if($errors->any())
    <div id="alert">
        <div>
          <div class="alert alert-danger alert-dismissible fade show" role="alert">
            Hay errores en el formulario. Por favor, revisá los datos e intentá nuevamente.
          </div>
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-x close" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
          </svg>
        </div>
    </div>
    @endif
    <form action="{{ route('auth.registrarse') }}" method="post" class="row">
        @csrf
        <div class="col-lg-5 col-md-8 mb-3">
            <label for="nombre">Nombre <span class="opcional">*Debe contener al menos 2 caracteres.</span></label>
            <input 
                type="text"
                id="nombre"
                name="nombre"
                class="form-control"
                value="{{ old('nombre') }}"
                @error('error-nombre') aria-describedby="error-nombre" @enderror
            >
            @error('nombre')
                <p id="error-nombre">{{ $message }}</p>
            @enderror            
        </div>
        <div class="col-lg-5 col-md-8 mb-3">
            <label for="apellido">Apellido <span class="opcional">*Debe contener al menos 2 caracteres.</span></label>
            <input 
                type="text"
                id="apellido"
                name="apellido"
                class="form-control"
                value="{{ old('apellido') }}"
                @error('error-apellido') aria-describedby="error-apellido" @enderror
            >
            @error('apellido')
                <p id="error-apellido">{{ $message }}</p>
            @enderror  
        </div>
        <div class="col-lg-5 col-md-8 mb-3">
            <label for="email">Email</label>
            <input 
                type="email" 
                name="email" 
                id="email" 
                class="form-control"
                value="{{ old('email') }}"
                @error('error-email') aria-describedby="error-email" @enderror
            >
            @error('email')
                <p id="error-email">{{ $message }}</p>
            @enderror  
        </div>
        <div class="col-lg-5 col-md-8 mb-4 campo-contrasena">
            <label for="password">Contraseña <span class="opcional">*Debe contener al menos 8 caracteres.</span></label>
            <input 
                type="password" 
                name="password" 
                id="password" 
                class="form-control"
                @error('error-password') aria-describedby="error-password" @enderror
            >
            <div id="btnContrasena">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye-slash" viewBox="0 0 16 16">
                <path d="M13.359 11.238C15.06 9.72 16 8 16 8s-3-5.5-8-5.5a7.028 7.028 0 0 0-2.79.588l.77.771A5.944 5.944 0 0 1 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.134 13.134 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755-.165.165-.337.328-.517.486l.708.709z"/>
                <path d="M11.297 9.176a3.5 3.5 0 0 0-4.474-4.474l.823.823a2.5 2.5 0 0 1 2.829 2.829l.822.822zm-2.943 1.299.822.822a3.5 3.5 0 0 1-4.474-4.474l.823.823a2.5 2.5 0 0 0 2.829 2.829z"/>
                <path d="M3.35 5.47c-.18.16-.353.322-.518.487A13.134 13.134 0 0 0 1.172 8l.195.288c.335.48.83 1.12 1.465 1.755C4.121 11.332 5.881 12.5 8 12.5c.716 0 1.39-.133 2.02-.36l.77.772A7.029 7.029 0 0 1 8 13.5C3 13.5 0 8 0 8s.939-1.721 2.641-3.238l.708.709zm10.296 8.884-12-12 .708-.708 12 12-.708.708z"/>
                </svg>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                </svg>
            </div>
            @error('password')
                <p id="error-password">{{ $message }}</p>
            @enderror  
        </div>
        <button class="btn btn-blue col-lg-2 col-md-7" type="submit">Registrarme</button>
    </form>
</section>
@endsection