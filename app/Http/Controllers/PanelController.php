<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Curso;
use App\Models\Inscripcion;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    public function index()
    {
        //obtengo los cursos que pertenecen a inscripciones.
        $cursosPorInscripciones = Curso::withCount('inscripciones')
            ->orderByDesc('inscripciones_count')
            ->get();

        $cursoConMasInscripciones = $cursosPorInscripciones->first();
        
        $cursoConMasBajas = Curso::join(
            DB::raw('(SELECT curso_id, COUNT(*) AS deleted_at_count
                FROM inscripciones
                WHERE deleted_at IS NOT NULL
                GROUP BY curso_id) as deleted_at_counts'),
            'cursos.curso_id',
            '=',
            'deleted_at_counts.curso_id'
        )
        // Ordena por la cantidad de deleted_at en inscripciones
        ->orderByDesc('deleted_at_counts.deleted_at_count') 
        ->first();

        $mesConMasInscripciones = DB::table('inscripciones')
            ->join('cursos', 'inscripciones.curso_id', '=', 'cursos.curso_id')
            ->select(DB::raw('YEAR(inscripciones.created_at) as year, MONTH(inscripciones.created_at) as month'), DB::raw('count(*) as inscripciones'))
            ->whereNull('inscripciones.deleted_at')
            ->groupBy(DB::raw('YEAR(inscripciones.created_at), MONTH(inscripciones.created_at)'))
            ->orderByDesc('inscripciones')
            ->first();

        $usuariosRegistrados = Usuario::count();

        $usuariosIncriptos = DB::table('inscripciones')
            // Evita contar al mismo usuario más de una vez
            ->distinct('usuario_id')
            ->count('usuario_id');

        return view('admin.panel.index', [
            'cursosPorInscripciones' => $cursosPorInscripciones,
            'cursoConMasInscripciones' => $cursoConMasInscripciones,
            'cursoConMasBajas' => $cursoConMasBajas, 
            'mesConMasInscripciones' => $mesConMasInscripciones,
            'usuariosRegistrados' => $usuariosRegistrados,
            'usuariosIncriptos' => $usuariosIncriptos,
        ]);
    }
}
