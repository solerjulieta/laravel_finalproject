<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Usuario;
use Illuminate\Http\Request;

class RegistroController extends Controller
{
    public function formRegistro()
    {
        return view('auth.form-registro');
    }

    public function registrarse(Request $request)
    {
        $data = $request->except(['_token']);
        $request->validate(Usuario::VALIDATE_RULES, Usuario::VALIDATE_MESSAGES);

        $usuario = Usuario::create([
            'nombre' => $request->nombre,
            'apellido' => $request->apellido,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);

        return redirect()
            ->route('auth.formLogin')
            ->with('statusType', 'success')
            ->with('statusMessage', '¡El registro se ha realizado exitosamente! Ya podés iniciar sesión.');
    }
}
