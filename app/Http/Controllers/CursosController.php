<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Curso;
use App\Models\Duracion;
use App\Models\Horario;
use App\Models\Modalidad;
use App\Models\Objetivo;
use App\Uploaders\CursoImgUploaders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class CursosController extends Controller
{
    public function index()
    {
        $cursos = Curso::with(['duracion', 'inscripciones'])->get();

        return view('/admin.cursos.inicio', [ 
            'cursos' => $cursos,
        ]);
    }

    public function ver(int $id)
    {
        $curso = Curso::with(['duracion', 'objetivos', 'modalidades', 'horarios.horas', 'horarios.dias'])->findOrFail($id);
        $curso->horarios = Horario::formatoHoras($curso->horarios);

        return view('admin.cursos.ver', [
            'curso' => $curso,
        ]);
    }

    public function papelera()
    {
        $cursos = Curso::onlyTrashed()->with(['duracion'])->get();

        return view('admin.cursos.papelera', [
            'cursos' => $cursos,
        ]);
    }

    public function formNuevo()
    {
        $horarios = Horario::with(['horas', 'dias'])->get();
        $horarios = Horario::formatoHoras($horarios);

        return view('admin.cursos.form-nuevo', [
            'duraciones' => Duracion::orderBy('duracion')->get(),
            'objetivos' => Objetivo::orderBy('objetivo')->get(),
            'modalidades' => Modalidad::orderBy('nombre')->get(),
            'horarios' => $horarios,
        ]);
    }

    public function publicar(Request $request, CursoImgUploaders $cursoImgUploaders)
    {
        $data = $request->except(['_token']);
        $request->validate(Curso::VALIDATE_RULES, Curso::VALIDATE_MESSAGES);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $nombreImg = date('YmdHis') . "_" . \Str::slug($data['nombre']) . "." . $img->extension();
            $path = storage_path('app/public/img/');
        
            $image = Image::make($img);
            $cursoImgUploaders->formatearImg($image, $path, $nombreImg);
        
            $data['img'] = $nombreImg;
        }
        
        if ($request->hasFile('portada')) {
            $portada = $request->file('portada');
            $nombrePortada = date('YmdHis') . "_portada_" . \Str::slug($data['nombre']) . "." . $portada->extension();;
        
            // Redimensiona y almacena la versión para tablet
            $nombrePortadaTablet = $nombrePortada;
            $pathTablet = storage_path('app/public/img/');
            $portadaImageTablet = Image::make($portada);
            $cursoImgUploaders->formatearPortada($portadaImageTablet, $pathTablet, $nombrePortadaTablet, 'tablet');
        
            // Redimensiona y almacena la versión para móvil
            $nombrePortadaMobile = $nombrePortada;
            $pathMobile = storage_path('app/public/img/');
            $portadaImageMobile = Image::make($portada);
            $cursoImgUploaders->formatearPortada($portadaImageMobile, $pathMobile, $nombrePortadaMobile, 'mobile');
        
            // Usa nombre original para pc
            $pathPC = storage_path('app/public/img/');
            $portadaImagePC = Image::make($portada);
            $cursoImgUploaders->formatearPortada($portadaImagePC, $pathPC, $nombrePortada, 'pc');
        
            $data['portada'] = $nombrePortada;
        }

        try {
            DB::transaction(function() use($data){
                $curso = Curso::create($data);
                $curso->objetivos()->attach($data['objetivos'] ?? []);
                $curso->modalidades()->attach($data['modalidades']);
                $curso->horarios()->attach($data['horarios']);
            });
            return redirect()
                ->route('admin.cursos.inicio')
                ->with('statusType', 'success')
                ->with('statusMessage', 'El curso <b>' . e($data['nombre']) . '</b> fue creado con éxito.');
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.cursos.formNueva')
                ->with('statusType', 'danger')
                ->with('statusMessage', 'Ocurrió un error inesperado al tratar de publicar el curso, intenta nuevamente más tarde.')
                ->withInput();
        }
    }

    public function formEditar(int $id)
    {
        $curso = Curso::findOrFail($id);
        $horarios = Horario::with(['horas', 'dias'])->get();
        $horarios = Horario::formatoHoras($horarios);

        return view('admin.cursos.editar', [
            'curso' => $curso,
            'duraciones' => Duracion::orderBy('duracion')->get(),
            'objetivos' => Objetivo::orderBy('objetivo')->get(),
            'modalidades' => Modalidad::orderBy('nombre')->get(),
            'horarios' => $horarios,
        ]);
    }

    public function editar(Request $request, int $id, CursoImgUploaders $cursoImgUploaders)
    {
        $request->validate(Curso::VALIDATE_RULES, Curso::VALIDATE_MESSAGES);

        $curso = Curso::findOrFail($id);

        $data = $request->except(['_token']);

        if($request->hasFile('img')) {
            $img = $request->file('img');
            $nombreImg = date('YmdHis') . "_" . \Str::slug($data['nombre']) . "." . $img->extension();
            $path = storage_path('app/public/img/');
    
            $image = Image::make($img);
            $cursoImgUploaders->formatearImg($image, $path, $nombreImg);
    
            $data['img'] = $nombreImg;
    
            $imgAnterior = $curso->img;
        }
    
        if($request->hasFile('portada')) {
            $portada = $request->file('portada');
            $nombrePortada = date('YmdHis') . "_portada_" . \Str::slug($data['nombre']) . "." . $portada->extension();
            $path = storage_path('app/public/img/');
    
            // Redimensiona y almacena la versión para tablet
            $nombrePortadaTablet = $nombrePortada;
            $pathTablet = storage_path('app/public/img/');
            $portadaImageTablet = Image::make($portada);
            $cursoImgUploaders->formatearPortada($portadaImageTablet, $pathTablet, $nombrePortadaTablet, 'tablet');

            // Redimensiona y almacena la versión para móvil
            $nombrePortadaMobile = $nombrePortada;
            $pathMobile = storage_path('app/public/img/');
            $portadaImageMobile = Image::make($portada);
            $cursoImgUploaders->formatearPortada($portadaImageMobile, $pathMobile, $nombrePortadaMobile, 'mobile');

            // Usa nombre original para pc
            $pathPC = storage_path('app/public/img/');
            $portadaImagePC = Image::make($portada);
            $cursoImgUploaders->formatearPortada($portadaImagePC, $pathPC, $nombrePortada, 'pc');

            $data['portada'] = $nombrePortada;

            $portadaAnterior = $curso->portada;
        }

        try {
            DB::transaction(function () use($curso, $data){
                $curso->update($data);
                $curso->objetivos()->sync($data['objetivos']);
                $curso->modalidades()->sync($data['modalidades']);
                $curso->horarios()->sync($data['horarios']);
            });

            if(isset($imgAnterior) && Storage::disk('public')->has('img/' . $imgAnterior)){
                Storage::disk('public')->delete('img/' . $imgAnterior);
            }

            if(isset($portadaAnterior) && Storage::disk('public')->has('img/' . $portadaAnterior)){
                Storage::disk('public')->delete('img/' . $portadaAnterior);
                Storage::disk('public')->delete('img/tb-' . $portadaAnterior);
                Storage::disk('public')->delete('img/mb-' . $portadaAnterior);
            }

            return redirect()
                ->route('admin.cursos.inicio')
                ->with('statusType', 'success')
                ->with('statusMessage', 'El curso <b>' . e($curso->nombre) . '</b> fue actualizado con éxito.');
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.cursos.formEditar', ['id' => $id])
                ->with('statusType', 'danger')
                ->with('statusMessage', 'Ocurrió un error inesperado al tratar de editar: <b>' . e($curso->nombre) . '</b>, intentá nuevamente más tarde.')
                ->withInput();
        }
    }

    public function modificarMostrar(int $id)
    {
        $curso = Curso::findOrFail($id);

        try {
            $curso->update(['mostrar' => !$curso->mostrar]);
            return redirect()
                ->route('admin.cursos.inicio')
                ->with('statusMessage', 'El curso ' . ($curso->mostrar ? 'se muestra visible' : 'se ha ocultado') . '.');
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.cursos.inicio')
                ->with('statusType', 'danger')
                ->with('statusMessage', 'Ocurrió un error inesperado al tratar de:' . ($curso->mostrar ? 'mostrar' : 'ocultar') . '</b>, el curso, intentá nuevamente más tarde.')
                ->withInput();
        }
    }

    public function confirmarEliminar(int $id)
    {
        $curso = Curso::findOrFail($id);
        return view('admin.cursos.eliminar', [
            'curso' => $curso,
        ]);
    }

    public function eliminar(Request $request, int $id)
    {
        $curso = Curso::findOrFail($id);

        try {
            DB::transaction(function() use($curso) {
                $curso->delete();
            });
            return redirect()
                ->route('admin.cursos.inicio')
                ->with('statusMessage', 'El curso <b>' . e($curso->nombre) . '</b> fue eliminado.')
                ->with('statusAction', [
                    'route' => route('admin.cursos.restablecer', ['id' => $curso->curso_id]),
                    'form' => true, 
                    'method' => 'post',
                    'buttonText' => 'Deshacer' 
                ]);
        } catch (\Throwable $th) {
            return redirect()
            ->route('admin.entradas.confirmarEliminar'. ['id' => $id])
            ->with('statusType', 'danger')
            ->with('statusMessage', 'Ocurrió un error inesperado al tratar de eliminar el curso. Por favor, intentar nuevamente más tarde.')
            ->withInput();
        }
    }

    public function restablecer(int $id)
    {
        $curso = Curso::onlyTrashed()->findOrFail($id);
        $curso->restore();

        return redirect()
            ->route('admin.cursos.inicio')
            ->with('statusType', 'success')
            ->with('statusMessage', 'El curso <b>' . $curso->nombre . '</b> fue restablecido con éxito.');
    }

    public function papeleraEliminar(Request $request, int $id)
    {
        $curso = Curso::withTrashed()->findOrFail($id);

        if(isset($curso->img) && Storage::disk('public')->has('img/' . $curso->img)){
            Storage::disk('public')->delete('img/' . $curso->img);
        }

        if(isset($curso->portada) && Storage::disk('public')->has('img/' . $curso->portada)){
            Storage::disk('public')->delete('img/' . $curso->portada);
            Storage::disk('public')->delete('img/tb-' . $curso->portada);
            Storage::disk('public')->delete('img/mb-' . $curso->portada);
        }

        try {
            DB::transaction(function() use($curso){
                $curso->objetivos()->detach();
                $curso->modalidades()->detach();
                $curso->horarios()->detach();
                $curso->ForceDelete();
            });
            return redirect()
                ->route('admin.cursos.papelera')
                ->with('statusMessage', 'El curso <b>' . $curso->nombre . '</b> fue eliminado.');
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.cursos.papelera', ['id' => $id])
                ->with('statusType', 'danger')
                ->with('statusMessage', 'Ocurrió un error inesperado al tratar de eliminar: <b>' . e($curso->nombre) . '</b>, intentá nuevamente más tarde.')
                ->withInput();
        }
    }
}
