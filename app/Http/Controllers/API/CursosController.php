<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Curso;
use App\Models\Entrada;
use Illuminate\Http\Request;

class CursosController extends Controller
{
    /**
     * Obtiene las reglas de validación para la edición, que en este caso son las mismas que
     * para el alta, pero agregando al comienzo la regla "sometimes", para indicar que solo
     * se apliquen las reglas de cada campo si el valor está presente.
     * 
     * @return array
     */
    private static function getUpdateValidationRules(): array
    {
        return array_map(fn (string $rules) => 'sometimes|' . $rules, Curso::VALIDATE_RULES);
    }

    public function todo()
    {
       return response()->json([
            'data' => Curso::all(),
       ]); 
    }

    public function obtenerPorId(int $id)
    {
        return response()->json([
            'data' => Curso::findOrFail($id),
        ]);
    }

    public function obtenerEntrada(int $id)
    {
        return response()->json([
            'data' => Entrada::findOrFail($id),
        ]);
    }

    public function crear(Request $request)
    {
        $request->validate(Curso::VALIDATE_RULES, Curso::VALIDATE_MESSAGES);

        $curso = Curso::create($request->input());

        return response()->json([
            'status' => 0,
            'data' => $curso,
        ]);
    }

    public function editar(Request $request, int $id)
    {
        $request->validate($this->getUpdateValidationRules(), Curso::VALIDATE_MESSAGES);

        $curso = Curso::findOrFail($id);

        $curso->update($request->input());

        return response()->json([
            'status' => 0,
            'data' => $curso,
        ]);
    }

    public function eliminar(int $id)
    {
        Curso::findOrFail($id)->delete();

        return response()->json([
            'status' => 0,
        ]);
    }
}
