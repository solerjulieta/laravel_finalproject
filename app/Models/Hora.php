<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Hora
 *
 * @property int $hora_id
 * @property string $ingreso
 * @property string $egreso
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Hora newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hora newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Hora query()
 * @method static \Illuminate\Database\Eloquent\Builder|Hora whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hora whereEgreso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hora whereHoraId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hora whereIngreso($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Hora whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Hora extends Model
{
    //use HasFactory;
    protected $table = "horas";
    protected $primaryKey = "hora_id";
}
