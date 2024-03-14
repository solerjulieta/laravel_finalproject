<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function formLogin()
    {
        return view('auth.form-login');
    }

    public function iniciar(Request $request)
    {
        $credenciales = $request->only('email', 'password');

        if(Auth::attempt($credenciales)){
            $request->session()->regenerate();

            return redirect()
                ->route('admin.panel.inicio')
                ->with('statusMessage', 'Sesión iniciada correctamente.')
                ->with('statusType', 'success');
        }

        return redirect()
            ->route('auth.formLogin')
            ->with('statusMessage', 'Alguno de los datos ingresados no es correcto.')
            ->with('statusType', 'danger')
            ->withInput();
    }

    public function cerrar(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
            ->route('auth.formLogin')
            ->with('statusMessage', 'Se ha cerrado la sesión.')
            ->with('statusType', 'success');
    }
}
