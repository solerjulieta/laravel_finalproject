<?php

namespace App\Models;

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\Usuario
 *
 * @property int $usuario_id
 * @property int $rol_id
 * @property string $email
 * @property string $password
 * @property string $nombre
 * @property string $apellido
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Inscripcion[] $inscripciones
 * @property-read int|null $inscripciones_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Perfil|null $perfil
 * @property-read \App\Models\Roles $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereRolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereUsuarioId($value)
 * @mixin \Eloquent
 */
class Usuario extends User
{
    //use HasFactory;
    use HasApiTokens, Notifiable;

    protected $table = 'usuarios';
    protected $primaryKey = 'usuario_id';

    protected $fillable = ['nombre', 'apellido', 'email', 'password'];
    protected $hidden = ['password', 'remember_token'];

    public const VALIDATE_RULES = [
        'nombre' => 'sometimes|required|min:2',
        'apellido' => 'sometimes|required|min:2',
        'email' => 'sometimes|required|unique:usuarios',
        'password' => 'sometimes|required|min:8',
    ];

    public const VALIDATE_MESSAGES = [
        'nombre.required' => 'El nombre es requerido.',
        'nombre.min' => 'El nombre debe contener al menos :min caracteres.',
        'apellido.required' => 'El apellido es requerido.',
        'apellido.min' => 'El apellido debe contener al menos :min caracteres.',
        'email.required' => 'El email es requerido.',
        'email.unique' => 'El email ya se encuentra registrado.',
        'password.required' => 'La contraseña es requerida.',
        'password.min' => 'La contraseña debe contener al menos :min caracteres.',
    ];

    public function perfil()
    {
        return $this->hasOne(Perfil::class, 'usuario_id');
    }

    public function roles()
    {
        return $this->belongsTo(Roles::class, 'rol_id', 'rol_id');
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'usuario_id', 'usuario_id');
    }

    public function esAdmin()
    {
        if($this->roles->rol_id === 1){
            return true;
        }

        return false;
    }
}