<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Perfil
 *
 * @property int $perfil_id
 * @property int $usuario_id
 * @property string|null $avatar
 * @property string|null $bio
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Usuario $usuario
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil query()
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil wherePerfilId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereUsuarioId($value)
 * @mixin \Eloquent
 */
class Perfil extends Model
{
    //use HasFactory;
    protected $table = 'perfil';
    protected $primaryKey = 'perfil_id';

    protected $fillable = ['usuario_id', 'avatar', 'bio'];

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }
}
