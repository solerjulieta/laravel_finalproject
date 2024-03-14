<?php

namespace App\Http\Controllers;

use DB;
use App\Mail\InscripcionExitosa; 
use App\MercadoPago\ManejoPago;
use App\Models\Curso;
use App\Models\Modalidad; 
use App\Models\Horario; 
use App\Models\Inscripcion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; 
use Illuminate\Support\Facades\Mail;
use MercadoPago\Item;
use MercadoPago\Preference;
use MercadoPago\SDK;
use MP;

class MPController extends Controller
{
    public function formMostrar(Request $request, $id)
    {
        $data = $request->except(['_token']);

        $modalidad = Modalidad::findOrFail($data['modalidad_id']);
        $horario = Horario::with('horas')->findOrFail($data['horario_id']);

        $payment = new ManejoPago();

        $payment
            ->setItems(Curso::where('mostrar', true)->findOrFail([$id]))
            ->setBackUrls(
                success: route('mp.exito'),
                pending: route('mp.pendiente'),
                failure: route('mp.fallo')
            )
            ->setMetaData([
                'modalidad_id' => $data['modalidad_id'],
                'horario_id' => $data['horario_id'],
            ])
            ->save();

        $horario = Horario::formatoHoras([$horario]);

        return view('mp.pago', [
            'payment' => $payment,
            'modalidad' => $modalidad,
            'horario' => $horario[0],
        ]);
    }

    public function exito(Request $request)
    {
        // Obtiene el SKD. 
        SDK::setAccessToken(config('mercadopago.access_token'));

        // Obtiene el ID de preferencia desde la URL
        $preferenciaId = $request->input('preference_id');

        $preferencia = Preference::find_by_id($preferenciaId);

        if(!empty($preferencia) && !empty($preferencia->items[0])){
            $curso = Curso::where('nombre', '=', $preferencia->items[0]->title)->first();

            if($curso){
                $data = [
                    'usuario_id' => Auth::user()->usuario_id,
                    'curso_id' => $curso->curso_id,
                    'modalidad_id' => $preferencia->metadata->modalidad_id,
                    'horario_id' => $preferencia->metadata->horario_id,
                    'curso' => $preferencia->items[0]->title,
                    'precio' => $preferencia->items[0]->unit_price,
                    'fecha_inicio' => $curso->fecha_inicio,
                ];
            } else {
                return redirect()
                    ->route('cursos')
                    ->with('statusType', 'danger')
                    ->with('statusMessage', 'El curso al que estás intentando inscribirte no existe.');
            }
        } else {
            return redirect()
                ->route('cursos')
                ->with('statusType', 'danger')
                ->with('statusMessage', 'Parece que algo salió mal. Intenta nuevamente más tarde.');
        }

        $usuario = Auth::user()->nombre;
        $cursoInscripcion = $data['curso'];
        
        try {
            DB::transaction(function() use($data) {
                $inscripcion = Inscripcion::create($data);
            });
            Mail::to(Auth::user()->email)->send(new InscripcionExitosa($usuario, $cursoInscripcion));
            return redirect()
                ->route('misCursos')
                ->with('statusType', 'success')
                ->with('statusMessage', 'Tu pago fue realizado con éxito.');
        } catch (\Throwable $th) {
            return redirect()
                ->route('perfil')
                ->with('statusType', 'danger')
                ->with('statusMessage', 'Parece que algo salió mal. Intenta nuevamente más tarde.');
        }
    }

    public function pendiente(Request $request)
    {
        return view('mp.pendiente');
    }

    public function fallo(Request $request)
    {
        return view('mp.fallo');
    }
}
