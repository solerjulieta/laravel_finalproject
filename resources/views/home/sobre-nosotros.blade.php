@extends('layouts.main')

@section('title', 'Sobre nosotros')

@section('main')
<section id="sobre-nosotros">
    <div>
        <div>
        <h1>Sobre Nosotros</h1>
        <p>"Somos un grupo de profesionales que se unieron para crear experiencias de aprendizaje y desarrollo profesional increíbles."</p>
        </div>
        <picture>
            <source media="(max-width:767px)" srcset="./img/mb-profesores.jpg">
            <source media="(max-width:992px)" srcset="./img/tb-profesores.jpg" >
            <img src="./img/profesores.jpg" alt="Profesores de QuicKourses en reunión.">
        </picture>
    </div>
</section>
<section id="mision">
    <div class="card">
        <div class="card-body">
          <img src="./img/i-brujula.png" alt="ícono de brújula">
          <h2 class="card-title">Misión</h2>
          <p class="card-text">Formar profesionales que enfrenten los desafíos de iniciar sus propios proyectos. Que posean una cultura de valores sustentados en el respeto individual y colectivo, aportando a la realidad social.</p>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
          <img src="./img/i-vision.png" alt="ícono de mundo">
          <h2 class="card-title">Visión</h2>
          <p class="card-text">Fortalecernos como institución educativa, generando innovaciones para alcanzar un desarrollo óptimo de nuestro servicio educativo. Proyectándonos hacia el futuro en el ámbito nacional e internacional.</p>
        </div>
    </div>
</section>
<section id="valores">
    <h2>Nuestros Valores</h2>
    <ol>
        <li>
            <h3>Innovación</h3>
            <p>Aportamos a la enseñanza la práctica profesional.</p>
        </li>
        <li>
            <h3>Nos centramos en nuestros estudiantes</h3>
            <p>Trabajamos todos los días para resolver sus problemas, agregarles valor y lograr que aprender se convierta en una experiencia única e increíble.</p>
        </li>
        <li>
            <h3>Nos apasiona aprender</h3>
            <p>Buscamos continuamente crecer y aprender cosas nuevas.</p>
        </li>
        <li>
            <h3>Somos líderes</h3>
            <p>Llevamos a cabo procesos de comienzo a fin, logrando así excelentes resultados.</p>
        </li>
    </ol>
</section>
<section id="historia">
    <div>
        <h2>Nuestra historia</h2>
        <p>QuicKourses nace en el año 2015, en Córdoba Capital, Argentina. Surge del propósito de transformar la vida de las personas a través de la educación, de hacer lo que nos apasiona que es enseñar y también aprender.</p>
        <p>Comenzamos dictando algunos pocos cursos y luego fuimos creciendo más, porque queremos acompañar a todas las personas que nos sea posible en este hermoso camino para concretar sus sueños, para que puedan convertirse en los profesionales que desean ser.</p>
    </div>
    <picture>
        <source media="(max-width:767px)" srcset="./img/mb-sede-quickourses.jpg">
        <source media="(max-width:992px)" srcset="./img/tb-sede-quickourses.jpg" >
        <img src="./img/sede-quickourses.jpg" alt="Sede de QuicKourses">
    </picture>
</section>
@endsection