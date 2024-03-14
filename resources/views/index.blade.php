<?php
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Curso[] $cursos */
?>
@extends('layouts.main')

@section('title', 'Inicio')

@section('main')
<section id="intro">
    <div>
        <h1>Estudiá en QuicKourses</h1>
        <p>¡Invertí en tu futuro!</p>
        <p>Te acompañamos a desarrollar todas tus habilidades en un tiempo récord.</p>
        <a href="{{ route('cursos') }}" class="btn btn-blue">Conocé nuestros cursos</a>
    </div>
    <div>
        <picture>
            <source media="(max-width:767px)" srcset="./img/mb-estudiante-quickourse.jpg">
            <source media="(max-width:992px)" srcset="./img/tb-estudiante-quickourse.jpg" >
            <img src="./img/estudiante-quickourse.jpg" alt="Estudiante sonriendo con pulgar arriba">
        </picture>
    </div>
</section>
<section id="motivos">
    <h2>¿Por qué QuicKourses?</h2>
    <div id="mtvs">
      <div>
          <img src="./img/i-apoyo-profesional.png" alt="ícono de apoyo profesional">
          <h3>Apoyo profesional</h3>
          <p>Nuestros profesores y tutores te acompañarán en cada paso para que tengas la mejor experiencia de aprendizaje.</p>
      </div>
      <div>
          <img src="./img/i-experiencia-laboral.png" alt="ícono de experiencia laboral">
          <h3>Experiencia laboral</h3>
          <p>Te vamos a acercar todas las ofertas laborales que se ajusten a tu perfil. Además contarás con eventos exclusivos que te servirán para seguir formándote.</p>
      </div>
      <div>
          <img src="./img/i-contenido-actualizado.png" alt="ícono de contenido actualizado">
          <h3>Contenido actualizado</h3>
          <p>Actualizamos todos los contenidos dictados en los cursos para que siempre estés al día con las últimas tendencias.</p>
      </div>
    </div>
</section>
<section id="modalidad">
    <h2>Modalidades de estudio</h2>
    <div>
      <div class="card shadow-sm">
          <div class="card-body">
            <img src="./img/i-presencial.png" alt="ícono curso presencial">
            <h3 class="card-title">Presencial</h3>
            <p class="card-text">Estudiá en nuestra sede que está totalmente equipada con todo lo necesario para acompañarte en tu formación.</p>
          </div>
      </div>
      <div class="card shadow-sm">
          <div class="card-body">
            <img src="./img/i-virtual.png" alt="ícono curso virtual">
            <h3 class="card-title">Online</h3>
            <p class="card-text">Algunos de nuestros cursos cuentan con la modalidad online para que los puedas hacer en la comodidad de tu hogar.</p>
          </div>
      </div>
    </div>
</section>
<section class="container" id="view-cursos">
    <h2>Nuestros cursos</h2>
    <ul>
        @foreach($cursos as $curso)
        <li class="card shadow">
          @if($curso->img != null && Storage::disk('public')->has('img/' . $curso->img))
          <img src="{{ Storage::disk('public')->url('img/' . $curso->img) }}" class="card-img-top" alt="{{ $curso->img_descripcion }}">
          @else
          <img src="{{ Storage::disk('public')->url('img/curso-img-default.jpg') }}" class="card-img-top" alt="No hay una imagen cargada.">
          @endif
          <h3 class="card-title">{{ $curso->nombre }}</h3>
          <p>Fecha de inicio: {{ $curso->fecha_inicio }}</p>
          <a href="{{ route('ver-curso', ['id' => $curso->curso_id]) }}" class="btn btn-blue">Ver más</a>
        </li>
        @endforeach
    </ul>
</section>
<section id="preg-frecuentes" class="container">
    <h2>Preguntas frecuentes</h2>
    <div class="row">
    <div class="accordion accordion-flush" id="accordionFlushExample">
        <div class="accordion-item">
          <h3 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="box-shadow:none">
              ¿Las vacantes son limitadas?
            </button>
          </h3>
          <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Sí. Los cursos presenciales tienen una capacidad máxima de 40 personas. Los cursos virtuales tienen una capacidad máxima de 50 personas.</div>
          </div>
        </div>
        <div class="accordion-item">
          <h3 class="accordion-header" id="flush-headingTwo">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" style="box-shadow:none">
              ¿Qué validez tienen los cursos de QuicKourses?
            </button>
          </h3>
          <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Todos nuestros cursos tienen validez Nacional.</div>
          </div>
        </div>
        <div class="accordion-item">
          <h3 class="accordion-header" id="flush-headingThree">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree" style="box-shadow:none">
              ¿Cuáles son los medios de pago?
            </button>
          </h3>
          <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Podés pagar con tarjeta de crédito o débito a través de Mercado Pago, con dinero en cuenta de Mercado Pago o hacer una transferencia bancaria.</div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection