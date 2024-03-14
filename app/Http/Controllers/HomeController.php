<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Curso;
use App\Models\Inscripcion;
use App\Models\Entrada;
use App\Models\Etiqueta;
use App\Models\Horario;
use App\Models\Perfil;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class HomeController extends Controller
{
    public function index()
    {
        $cursos = Curso::where('mostrar', true)->get();

        return view('index', [ 
            'cursos' => $cursos,
        ]);
    }

    public function sobreNosotros()
    {
        return view('home.sobre-nosotros');
    }

    public function cursos()
    {
        $cursos = Curso::where('mostrar', true)->get();

        return view('home.cursos', [
            'cursos' => $cursos,
        ]);
    }

    public function verCurso(int $id)
    {
        $curso = Curso::with(['horarios.dias', 'horarios.horas'])->where('mostrar', true)->findOrFail($id);
        
        $curso->horarios = Horario::formatoHoras($curso->horarios);

        $usuarioInscripto = false;

        if(Auth::check()) {
            $usuario = Usuario::findOrFail(Auth::user()->usuario_id);

            // Obtiene las inscripciones del usuario para el curso actual
            $inscripcion = $usuario->inscripciones()
                ->where('curso_id', $curso->curso_id)
                ->first();

            // Comprueba si el usuario está inscrito en el curso
            $usuarioInscripto = $inscripcion !== null;
        }
            
        return view('home.ver-curso', [
            'curso' => $curso,
            'usuarioInscripto' => $usuarioInscripto,
        ]);
    }

    public function blog(Request $request)
    {
        $entradasBuilder = Entrada::with(['etiquetas']);

        $buscarParametros = [
            'titulo' => $request->query('titulo') ?? null,
        ];

        if($buscarParametros['titulo']){
            $entradasBuilder->where('titulo', 'LIKE', '%' . $buscarParametros['titulo'] . '%');
        }

        $entradas = $entradasBuilder->paginate(3)->withQueryString();

        return view('home.blog', [
            'entradas' => $entradas,
            'buscarParametros' => $buscarParametros,
            'sinResultados' => $entradas->isEmpty(),
        ]);
    }

    public function verEntrada(int $id)
    {
        $entrada = Entrada::findOrFail($id);
        return view('home.ver-entrada', [
            'entrada' => $entrada,
        ]);
    }

    public function misCursos()
    {
        $inscripciones = Inscripcion::with(['horario.dias', 'horario.horas' , 'modalidad', 'cursoInscripto'])->get()->where('usuario_id', '=', Auth::user()->usuario_id);
        $inscripciones = Inscripcion::formatoHoras($inscripciones);

        return view('home.mis-cursos', [
            'inscripciones' => $inscripciones,
        ]);
    }

    public function confirmarBaja(int $id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        return view('home.curso-baja', [
            'inscripcion' => $inscripcion,
        ]);
    }

    public function formAdministrar(int $id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        $curso = Curso::with(['horarios.dias', 'horarios.horas', 'modalidades'])->findOrFail($inscripcion->curso_id);
        $curso->horarios = Horario::formatoHoras($curso->horarios);

        return view('home.curso-administrar', [
            'inscripcion' => $inscripcion,
            'curso' => $curso,
        ]);
    }

    public function editarModalidad(Request $request, int $id)
    {
        $inscripcion = Inscripcion::findOrFail($id);

        $data = $request->except(['_token']);

        try {
            DB::transaction(function () use($inscripcion, $data){
                $inscripcion->update($data);
            });
            return redirect()
                ->route('misCursos')
                ->with('statusType', 'success')
                ->with('statusMessage', 'La modalidad fue cambiada con éxito.');
        } catch (\Throwable $th) {
            return redirect()
                ->route('misCursos')
                ->with('statusType', 'danger')
                ->with('statusMessage', 'Ocurrió un error inesperado al intentar cambiar la modalidad, por favor, intenta nuevamente más tarde.')
                ->withInput();
        }
    }

    public function editarHorario(Request $request, int $id)
    {
        $inscripcion = Inscripcion::findOrFail($id);

        $data = $request->except(['_token']);

        try {
            DB::transaction(function () use($inscripcion, $data){
                $inscripcion->update($data);
            });
            return redirect()
                ->route('misCursos')
                ->with('statusType', 'success')
                ->with('statusMessage', 'El horario fue cambiado con éxito.');
        } catch (\Throwable $th) {
            return redirect()
                ->route('misCursos')
                ->with('statusType', 'danger')
                ->with('statusMessage', 'Ocurrió un error inesperado al intentar cambiar el horario, por favor, intenta nuevamente más tarde.')
                ->withInput();
        }
    }

    public function baja(Request $request, int $id)
    {
        $inscripcion = Inscripcion::findOrFail($id);
        $inscripcion->delete();

        return redirect()
            ->route('misCursos')
            ->with('statusMessage', 'Tu inscripción al curso <b>' . e($inscripcion->curso) . '</b> fue dada de baja.');
    }

    public function perfil()
    {
        $usuario = Usuario::with(['perfil'])->findOrFail(Auth::user()->usuario_id);
        return view('home.perfil', [
            'usuario' => $usuario,
        ]);
    }

    public function editarInfoPersonal(Request $request, int $id)
    {
        $request->validate(Usuario::VALIDATE_RULES, Usuario::VALIDATE_MESSAGES);
        
        $usuario = Usuario::findOrFail($id);

        $data = $request->except(['_token']);

        try {
            DB::transaction(function () use($usuario, $data){
                $usuario->update($data);
            });

            return redirect()
                   ->route('perfil')
                   ->with('statusType', 'success')
                   ->with('statusMessage', 'Tu información personal fue actualizada con éxito.');
        } catch (\Throwable $th) {
            return redirect()
                   ->route('perfil', ['id' => $id])
                   ->with('statusType', 'danger')
                   ->with('statusMessage', 'Ocurrió un error inesperado al tratar de editar tus datos personales, intentá nuevamente más tarde.')
                   ->withInput();
        }
    }

    public function editarApariencia(Request $request, int $id)
    {
        $data = $request->except(['_token']);
        $usuario = Usuario::findOrFail($id);

        if($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $nombreImg = date('YmdHis') . "_" . \Str::slug($usuario->email) . "." . $avatar->extension();

            $path = storage_path('app/public/img/');

            Image::make($avatar)
                ->fit(180, 180)
                ->save($path . $nombreImg);
            
            $data['avatar'] = $nombreImg;

            if($usuario->perfil){
                if($usuario->perfil->avatar){
                    $avatarAnterior = $usuario->perfil->avatar;
                }
            }
        }

        try {
            DB::transaction(function() use($data, $usuario){
                if($usuario->perfil){
                    $usuario->perfil()->update($data);
                } else {
                    $perfil = Perfil::create($data);
                }
            });
            if(isset($avatarAnterior) && Storage::disk('public')->has('img/' . $avatarAnterior)){
                Storage::disk('public')->delete('img/' . $avatarAnterior);
            }
            return redirect()
                ->route('perfil')
                ->with('statusType', 'success')
                ->with('statusMessage', 'Tu apariencia fue actualizada con éxito.');
        } catch (\Throwable $th) {
            return redirect()
                ->route('perfil', ['id' => $id])
                ->with('statusType', 'danger')
                ->with('statusMessage', 'Ocurrió un error inesperado al tratar de editar tu perfil, intentá nuevamente más tarde.')
                ->withInput();
        }
    }

    public function inscripcion()
    {
        return view('home.inscripcion');
    }
}