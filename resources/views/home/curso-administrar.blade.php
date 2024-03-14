<?php
/** @var \App\Models\Inscripcion $inscripcion */
?>
@extends('layouts.main')

@section('title', $inscripcion->curso)

@section('main')
<section class="container admin-cursos">
    <h1>Administración de curso</h1>
    <p>{{ $inscripcion->curso }}</p>
    <ul>
        <li>Inscripto desde: {{ $inscripcion->created_at }}</li>
        <li>Fecha de inicio: {{ $inscripcion->fecha_inicio }}</li>
        <li>Costo: ${{ $inscripcion->precio }}</li>
        <li>
            <form action="{{ route('editarModalidad', ['id' => $inscripcion->inscripcion_id]) }}" method="post">
                @csrf
                <div class="col-md-5 col-lg-3">
                    <label for="modalidad_id">Modalidad</label>
                    <select 
                        name="modalidad_id" 
                        id="modalidad_id"
                        class="form-select"
                    >
                    @foreach ($curso->modalidades as $modalidad)
                        <option
                            value="{{ $modalidad->modalidad_id }}"
                            @selected($modalidad->modalidad_id == old('modalidad_id', $inscripcion->modalidad_id))
                        >
                            {{ $modalidad->nombre }}
                        </option>
                    @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-blue">Guardar</button>
            </form>
        </li>
        <li>
            <form action="{{ route('editarHorario', ['id' => $inscripcion->inscripcion_id]) }}" method="post">
                @csrf
                <div class="col-md-5 col-lg-3">
                    <label for="horario_id">Horario</label>
                    <select 
                        name="horario_id" 
                        id="horario_id"
                        class="form-select"
                    >
                    @foreach ($curso->horarios as $horario)
                        <option
                            value="{{ $horario->horario_id }}"
                            @selected($horario->horario_id == old('horario_id', $inscripcion->horario_id))
                        >
                            {{ $horario->dias->nombre }} de {{ $horario->horas->ingreso }} a {{ $horario->horas->egreso }}hs.
                        </option>
                    @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-blue">Guardar</button>
            </form>
        </li>
    </ul>
</section>
@endsection