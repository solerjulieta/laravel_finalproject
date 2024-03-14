<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Duracion
 *
 * @property int $duracion_id
 * @property string $duracion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Duracion newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Duracion newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Duracion query()
 * @method static \Illuminate\Database\Eloquent\Builder|Duracion whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Duracion whereDuracion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Duracion whereDuracionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Duracion whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Duracion extends Model
{
    //use HasFactory;
    protected $table = 'duracion';
    protected $primaryKey = 'duracion_id';
}
