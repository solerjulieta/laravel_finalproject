<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\RecuperarPassword
 *
 * @property int $recuperar_id
 * @property int $usuario_id
 * @property string $token
 * @property string $expiracion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Usuario $usuario
 * @method static \Illuminate\Database\Eloquent\Builder|RecuperarPassword newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RecuperarPassword newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RecuperarPassword query()
 * @method static \Illuminate\Database\Eloquent\Builder|RecuperarPassword whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecuperarPassword whereExpiracion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecuperarPassword whereRecuperarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecuperarPassword whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecuperarPassword whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecuperarPassword whereUsuarioId($value)
 * @mixin \Eloquent
 */
class RecuperarPassword extends Model
{
    //use HasFactory;

    protected $table = 'recuperar_passwords';
    protected $primaryKey = 'recuperar_id';

    protected $fillable = ['usuario_id', 'token', 'expiracion'];

    public const VALIDATE_RULES = [
        'email' => 'required|email',
    ];

    public const VALIDATE_MESSAGES = [
        'email.required' => 'El email es requerido.',
    ];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
