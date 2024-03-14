<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Entrada;
use App\Models\Etiqueta;
use App\Uploaders\EntradaImgUploaders;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class EntradasController extends Controller
{
    public function index()
    {
        $entradas = Entrada::with(['etiquetas'])->get();

        return view('admin.entradas.index', [
            'entradas' => $entradas,
        ]);
    }

    public function papelera()
    {
        $entradas = Entrada::onlyTrashed()->with(['etiquetas'])->get();

        return view('admin.entradas.papelera', [
            'entradas' => $entradas,
        ]);
    }

    public function ver(int $id)
    {
        $entrada = Entrada::findOrFail($id);

        return view('admin.entradas.ver', [
            'entrada' => $entrada,
        ]);
    }

    public function formNueva()
    {
        return view('admin.entradas.form-nueva', [
            'etiquetas' => Etiqueta::orderBy('nombre')->get(),
        ]);
    }

    public function publicar(Request $request, EntradaImgUploaders $entradaImgUploaders)
    {
        $data = $request->except(['_token']);
        $request->validate(Entrada::VALIDATE_RULES, Entrada::VALIDATE_MESSAGES);

        if ($request->hasFile('img')) {
            $img = $request->file('img');
            $nombreImg = date('YmdHis') . "_" . \Str::slug($data['titulo']) . "." . $img->extension();
            $path = storage_path('app/public/img/');
    
            $image = Image::make($img);
            $entradaImgUploaders->formatearImg($image, $path, $nombreImg);
    
            $data['img'] = $nombreImg;
        }

        try {
            DB::transaction(function() use ($data) {
                $entrada = Entrada::create($data);
                $entrada->etiquetas()->attach($data['etiquetas'] ?? []); 
            });

            return redirect()
                ->route('admin.entradas.inicio')
                ->with('statusType', 'success')
                ->with('statusMessage', 'La entrada <b>' . e($data['titulo']) . '</b> fue creada con éxito.');
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.entradas.formNueva')
                ->with('statusType', 'danger')
                ->with('statusMessage', 'Ocurrió un error inesperado al tratar de publicar la entrada, intenta nuevamente más tarde.')
                ->withInput();
        }
    }

    public function formEditar(int $id)
    {
        $entrada = Entrada::findOrFail($id);

        return view('admin.entradas.editar', [
            'entrada' => $entrada,
            'etiquetas' => Etiqueta::orderBy('nombre')->get(),
        ]);
    }

    public function editar(Request $request, int $id, EntradaImgUploaders $entradaImgUploaders)
    {
        $request->validate(Entrada::VALIDATE_RULES, Entrada::VALIDATE_MESSAGES); 

        $entrada = Entrada::findOrFail($id);

        $data = $request->except(['_token']);

        if($request->hasFile('img')) {
            $img = $request->file('img');
            $nombreImg = date('YmdHis') . "_" . \Str::slug($data['titulo']) . "." . $img->extension();
            $path = storage_path('app/public/img/');
        
            $image = Image::make($img);
            $entradaImgUploaders->formatearImg($image, $path, $nombreImg);
        
            $data['img'] = $nombreImg;
        
            $imgAnterior = $entrada->img;
        }

        try {
            DB::transaction(function () use($entrada, $data) {
                $entrada->update($data);
                $entrada->etiquetas()->sync($data['etiquetas'] ?? []);      
            });

            if(isset($imgAnterior) && Storage::disk('public')->has('img/' . $imgAnterior)){
                Storage::disk('public')->delete('img/' . $imgAnterior);
            }
    
            return redirect()
                ->route('admin.entradas.inicio')
                ->with('statusType', 'success')
                ->with('statusMessage', 'La entrada <b>' . e($entrada->titulo) . '</b> fue actualizada con éxito.');
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.entradas.formEditar', ['id' => $id])
                ->with('statusType', 'danger')
                ->with('statusMessage', 'Ocurrió un error inesperado al tratar de editar: <b>' . e($entrada->titulo) . '</b>, intentá nuevamente más tarde.')
                ->withInput();
        }
    }

    public function confirmarEliminar(int $id)
    {
        $entrada = Entrada::findOrFail($id);

        return view('admin.entradas.eliminar', [
            'entrada' => $entrada,
        ]);
    }

    public function eliminar(Request $request, int $id)
    {
        $entrada = Entrada::findOrFail($id);
        $entrada->delete();

        return redirect()
            ->route('admin.entradas.inicio')
            ->with('statusMessage', 'La entrada <b>' . e($entrada->titulo) . '</b> fue eliminada.')
            ->with('statusAction', [
                'route' => route('admin.entradas.restablecer', ['id' => $entrada->entrada_id]),
                'form' => true, 
                'method' => 'post',
                'buttonText' => 'Deshacer' 
            ]);
    }

    public function restablecer(int $id)
    {
        $entrada = Entrada::onlyTrashed()->findOrFail($id);
        $entrada->restore();

        return redirect()
            ->route('admin.entradas.inicio')
            ->with('statusType', 'success')
            ->with('statusMessage', 'La entrada <b>' . $entrada->titulo . '</b> fue restablecida con éxito.');
    }

    public function papeleraEliminar(Request $request, int $id)
    {
        $entrada = Entrada::withTrashed()->findOrFail($id);

        if(isset($entrada->img) && Storage::disk('public')->has('img/' . $entrada->img)){
            Storage::disk('public')->delete('img/' . $entrada->img);
        }

        try {
            DB::transaction(function () use($entrada) {
                $entrada->etiquetas()->detach();
                $entrada->ForceDelete();
            });
            return redirect()
            ->route('admin.entradas.papelera')
            ->with('statusMessage', 'La entrada <b>' . e($entrada->titulo) . '</b> fue eliminada.');
        } catch (\Throwable $th) {
            return redirect()
                ->route('admin.entradas.papelera', ['id' => $id])
                ->with('statusType', 'danger')
                ->with('statusMessage', 'Ocurrió un error inesperado al tratar de eliminar: <b>' . e($entrada->titulo) . '</b>, intentá nuevamente más tarde.')
                ->withInput();
        }
    }
}
