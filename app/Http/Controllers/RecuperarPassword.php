<?php

namespace App\Http\Controllers;

use App\Mail\RecuperarPasswordMail;
use App\Models\Usuario;
use App\Models\RecuperarPassword as RecuperarContrasena;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class RecuperarPassword extends Controller
{
    public function formRecuperarPassword()
    {
        return view('auth.form-recuperar-password');
    }

    public function recuperarPassword(Request $request)
    {
        $request->validate(RecuperarContrasena::VALIDATE_RULES, RecuperarContrasena::VALIDATE_MESSAGES);

        $usuario = Usuario::where('email', $request->email)->first();

        if(!$usuario){
            return redirect()
                ->route('auth.formRecuperarPassword')
                ->with('statusType', 'danger')
                ->with('statusMessage', 'El email ingresado no está registrado.')
                ->withInput();
        }

        $token = Str::random(32);
        $expiracion = now()->addMinutes(30);

        $recuperarPassword = RecuperarContrasena::create([
            'usuario_id' => $usuario->usuario_id,
            'token' => $token,
            'expiracion' => $expiracion,
        ]);

        Mail::to($usuario)->send(new RecuperarPasswordMail($usuario, $token));
        
        return redirect()
            ->route('auth.formLogin')
            ->with('statusType', 'success')
            ->with('statusMessage', '¡Te enviamos un email para que puedas resetear tu clave!');
    }

    public function formResetear($token, $id)
    {
        return view('auth.form-cambiar-password', [
            'token' => $token,
            'id' => $id,
        ]);
    }

    public function resetearPassword(Request $request)
    {
        $request->validate(Usuario::VALIDATE_RULES, Usuario::VALIDATE_MESSAGES);

        $tokenValido = RecuperarContrasena::where('usuario_id', $request->id)->where('token', $request->token)->first();

        if(!$tokenValido){
            return redirect()
                ->route('auth.formResetear', ['token' => $request->token, 'id' => $request->id])
                ->with('statusType', 'danger')
                ->with('statusMessage', 'No se pudo actualizar la contraseña. El código no coincide con este usuario.');
        }
        if(now() > $tokenValido->expiracion){
            return redirect()
                ->route('auth.formResetear', ['token' => $request->token, 'id' => $request->id])
                ->with('statusType', 'danger')
                ->with('statusMessage', 'El código para actualizar la contraseña ha expirado.');
        }

        $usuario = Usuario::findOrFail($request->id);
        
        if($usuario){
            $usuario->update([
                'password' => Hash::make($request->password),
            ]);
            RecuperarContrasena::where('usuario_id', $request->id)->delete();
            return redirect()
                ->route('auth.formLogin')
                ->with('statusType', 'success')
                ->with('statusMessage', 'La contraseña fue reestablecida con éxito.');
        } else {
            return redirect()
                ->route('auth.formLogin')
                ->with('statusType', 'danger')
                ->with('statusMessage', 'El usuario no existe.');
        }
    }
}
