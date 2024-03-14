<?php

namespace App\Http\Controllers;

use App\Models\Inscripcion;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    public function index()
    {
        $usuarios = Usuario::all();

        return view('admin.usuarios.inicio', [
            'usuarios' => $usuarios,
        ]);
    }

    public function ver(int $id)
    {
        $usuario = Usuario::findOrFail($id);
        $inscripciones = Inscripcion::with(['horario.horas', 'horario.dias', 'modalidad'])->where('usuario_id', '=', $id)->get();
        $inscripciones = Inscripcion::formatoHoras($inscripciones);

        return view('admin.usuarios.ver', [
            'usuario' => $usuario,
            'inscripciones' => $inscripciones,
        ]);
    }
}
