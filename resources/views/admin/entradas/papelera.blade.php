<?php
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Entrada[] $entradas */
/** @var \Illuminate\Database\Eloquent\Collection|\App\Models\Etiqueta[] $etiquetas */
?>
@extends('layouts.main')

@section('title', 'Administrar Entradas de la papelera')

@section('main')
<section class="container">
   <a href="{{ route('admin.entradas.inicio') }}" class="back">
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-short" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M12 8a.5.5 0 0 1-.5.5H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5a.5.5 0 0 1 .5.5z"/>
      </svg>
      Volver
   </a>
   <h1>Administrar Entradas de la Papelera</h1>
   @if($entradas->isEmpty())
      <p>No hay entradas eliminadas.</p>
   @else
      <table class="table">
         <thead>
            <tr>
               <th>Título</th>
               <th>Fecha de publicación</th>
               <th>Etiquetas</th>
               <th>Intro</th>
               <th>Acciones</th>
            </tr>
         </thead>
         <tbody>
            @foreach ($entradas as $entrada)
            <tr>
               <td>{{ $entrada->titulo }}</td>
               <td>{{ $entrada->fecha_publicacion }}</td>
               <td>
                  @forelse ($entrada->etiquetas as $etiqueta)
                     <span class="badge rounded-pill text-bg-primary">{{ $etiqueta->nombre }}</span>
                  @empty
                     No especificado.
                  @endforelse
               </td>
               <td>{{ $entrada->intro }}</td>
               <td>
                  <div class="btn-group">
                     <form action="{{ route('admin.entradas.restablecer', ['id' => $entrada->entrada_id]) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-success">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-90deg-left" viewBox="0 0 16 16">
                              <path fill-rule="evenodd" d="M1.146 4.854a.5.5 0 0 1 0-.708l4-4a.5.5 0 1 1 .708.708L2.707 4H12.5A2.5 2.5 0 0 1 15 6.5v8a.5.5 0 0 1-1 0v-8A1.5 1.5 0 0 0 12.5 5H2.707l3.147 3.146a.5.5 0 1 1-.708.708l-4-4z"/>
                           </svg>
                        </button>
                     </form>
                     <form action="{{ route('admin.entradas.papeleraEliminar', ['id' => $entrada->entrada_id]) }}" method="post">
                        @csrf    
                        <button type="submit" class="btn btn-danger">
                           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                              <path d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z"/>
                           </svg>
                        </button>
                     </form>
                  </div>
               </td>
            </tr>
            @endforeach
         </tbody>
      </table>
   @endif   
</section>
@endsection