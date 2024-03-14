<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Inscripcion
 *
 * @property int $inscripcion_id
 * @property int $usuario_id
 * @property int $curso_id
 * @property int $modalidad_id
 * @property int $horario_id
 * @property string $curso
 * @property int $precio
 * @property string $fecha_inicio
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Usuario $alumno
 * @property-read \App\Models\Curso $cursoInscripto
 * @property-read \App\Models\Horario $horario
 * @property-read \App\Models\Modalidad $modalidad
 * @method static \Illuminate\Database\Eloquent\Builder|Inscripcion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inscripcion newQuery()
 * @method static \Illuminate\Database\Query\Builder|Inscripcion onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Inscripcion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Inscripcion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inscripcion whereCurso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inscripcion whereCursoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inscripcion whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inscripcion whereFechaInicio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inscripcion whereHorarioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inscripcion whereInscripcionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inscripcion whereModalidadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inscripcion wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inscripcion whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inscripcion whereUsuarioId($value)
 * @method static \Illuminate\Database\Query\Builder|Inscripcion withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Inscripcion withoutTrashed()
 * @mixin \Eloquent
 */
class Inscripcion extends Model
{
    //use HasFactory;
    use SoftDeletes;

    protected $table = 'inscripciones';
    protected $primaryKey = 'inscripcion_id';

    protected $fillable = ['usuario_id', 'curso_id', 'modalidad_id', 'horario_id', 'curso', 'precio', 'fecha_inicio'];

    public function cursoInscripto()
    {
        return $this->belongsTo(Curso::class, 'curso_id', 'curso_id');
    }

    public function alumno()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id', 'usuario_id');
    }

    public function modalidad()
    {
        return $this->belongsTo(Modalidad::class, 'modalidad_id', 'modalidad_id');
    }

    public function horario()
    {
        return $this->belongsTo(Horario::class, 'horario_id', 'horario_id');
    }

    public static function formatoHoras($inscripciones)
    {
        foreach ($inscripciones as $inscripcion) {
            $inscripcion->horario->horas->ingreso = Carbon::parse($inscripcion->horario->horas->ingreso)->format('H:i');
            $inscripcion->horario->horas->egreso = Carbon::parse($inscripcion->horario->horas->egreso)->format('H:i');
        }
        return $inscripciones;
    }
}
