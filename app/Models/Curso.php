<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Curso
 *
 * @property int $curso_id
 * @property int $duracion_id
 * @property string $nombre
 * @property string $descripcion
 * @property int $precio
 * @property string $fecha_inicio
 * @property string|null $portada
 * @property string|null $portada_descripcion
 * @property string|null $img
 * @property string|null $img_descripcion
 * @property int $mostrar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \App\Models\Duracion $duracion
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Horario[] $horarios
 * @property-read int|null $horarios_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Inscripcion[] $inscripciones
 * @property-read int|null $inscripciones_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Modalidad[] $modalidades
 * @property-read int|null $modalidades_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Objetivo[] $objetivos
 * @property-read int|null $objetivos_count
 * @method static \Illuminate\Database\Eloquent\Builder|Curso newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Curso newQuery()
 * @method static \Illuminate\Database\Query\Builder|Curso onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Curso query()
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereCursoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereDuracionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereFechaInicio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereImgDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereMostrar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso wherePortada($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso wherePortadaDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso wherePrecio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Curso whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Curso withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Curso withoutTrashed()
 * @mixin \Eloquent
 */
class Curso extends Model
{
    //use HasFactory;
    use SoftDeletes;

    protected $table = 'cursos';
    protected $primaryKey = 'curso_id';

    protected $fillable = ['duracion_id', 'nombre', 'descripcion', 'precio', 'fecha_inicio', 'portada', 'portada_descripcion' , 'img', 'img_descripcion', 'mostrar'];

    public const VALIDATE_RULES = [
        'duracion_id' => 'required|integer|exists:duracion',
        'nombre' => 'required|min:5',
        'descripcion' => 'required|min:20',
        'precio' => 'required|numeric|min:0',
        'fecha_inicio' => 'required|date_format:Y-m-d',
    ];

    public const VALIDATE_MESSAGES = [
        'duracion_id.required' => 'La duración del curso es requerida.',
        'duracion_id.integer' => 'La duración del curso debe ser un número entero.',
        'duracion_id.exists' => 'La duración del curso ingresada no existe.',
        'nombre.required' => 'El nombre es requerido.',
        'nombre.min' => 'El nombre debe contener al menos :min caracteres.',
        'descripcion.required' => 'La descripción es requerida.',
        'descripcion.min' => 'La descripción debe contener al menos :min caracteres.',
        'precio.required' => 'El precio es requerido.',
        'precio.numeric' => 'El precio debe ser un número.',
        'precio.min' => 'El precio debe ser un valor positivo.',
        'fecha_inicio.required' => 'La fecha de inicio es requerida.',
    ];

    public function duracion()
    {
        return $this->belongsTo(Duracion::class, 'duracion_id', 'duracion_id');
    }

    public function objetivos()
    {
        return $this->belongsToMany(
            Objetivo::class, 
            'cursos_tienen_objetivos', 
            'curso_id', 
            'objetivo_id',
            'curso_id',
            'objetivo_id'
        );
    }

    public function modalidades()
    {
        return $this->belongsToMany(
            Modalidad::class,
            'cursos_tienen_modalidades',
            'curso_id',
            'modalidad_id',
            'curso_id',
            'modalidad_id'
        );
    }

    public function horarios()
    {
        return $this->belongsToMany(
            Horario::class,
            'cursos_tienen_horarios',
            'curso_id',
            'horario_id',
            'curso_id',
            'horario_id'
        );
    }

    public function inscripciones()
    {
        return $this->hasMany(Inscripcion::class, 'curso_id', 'curso_id');
    }

    /**
     * Métodos
    */
    public function getModalidadesId(): array 
    {
        return $this->modalidades->pluck('modalidad_id')->toArray();
    }

    public function getObjetivosId(): array
    {
        return $this->objetivos->pluck('objetivo_id')->toArray();
    }

    public function getHorariosId(): array
    {
        return $this->horarios->pluck('horario_id')->toArray();
    }
}
