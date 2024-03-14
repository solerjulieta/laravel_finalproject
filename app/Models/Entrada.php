<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Entrada
 *
 * @property int $entrada_id
 * @property string $titulo
 * @property string $fecha_publicacion
 * @property string $intro
 * @property string $sinopsis
 * @property string $cuerpo
 * @property string|null $img
 * @property string|null $img_descripcion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Etiqueta[] $etiquetas
 * @property-read int|null $etiquetas_count
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada newQuery()
 * @method static \Illuminate\Database\Query\Builder|Entrada onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada query()
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada whereCuerpo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada whereEntradaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada whereFechaPublicacion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada whereImg($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada whereImgDescripcion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada whereIntro($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada whereSinopsis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada whereTitulo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Entrada whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Entrada withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Entrada withoutTrashed()
 * @mixin \Eloquent
 */
class Entrada extends Model
{
    //use HasFactory;
    use SoftDeletes;

    protected $table = 'entradas';
    protected $primaryKey = 'entrada_id';

    protected $fillable = ['titulo', 'fecha_publicacion', 'intro' , 'sinopsis', 'cuerpo', 'img', 'img_descripcion'];

    public const VALIDATE_RULES = [
        'titulo' => 'required|min:5',
        'intro' => 'required|min:20',
        'sinopsis' => 'required|min:50',
        'cuerpo' => 'required|min:100',
    ];

    public const VALIDATE_MESSAGES = [
        'titulo.required' => 'El título es requerido.',
        'titulo.min' => 'El título debe contener al menos :min caracteres.',
        'intro.required' => 'La introducción es requerida.',
        'intro.min' => 'La introducción debe contener al menos :min caracteres.',
        'sinopsis.required' => 'La sinopsis es requerida.',
        'sinopsis.min' => 'La sinopsis debe contener al menos :min caracteres.',
        'cuerpo.required' => 'El cuerpo es requerido.',
        'cuerpo.min' => 'El cuerpo debe contener al menos :min caracteres.', 
    ];

    public function etiquetas()
    {
        return $this->belongsToMany(
            Etiqueta::class,
            'entradas_tienen_etiquetas',
            'entrada_id',
            'etiqueta_id',
            'entrada_id',
            'etiqueta_id',
        );
    }

    /**
     * Métodos
    */
     public function getEtiquetasId(): array
     {
        return $this->etiquetas->pluck('etiqueta_id')->toArray();
     }
}
