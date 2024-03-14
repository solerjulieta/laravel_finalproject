<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Horario
 *
 * @property int $horario_id
 * @property int $dia_id
 * @property int $hora_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Dia $dias
 * @property-read \App\Models\Hora $horas
 * @method static \Illuminate\Database\Eloquent\Builder|Horario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Horario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Horario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereDiaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereHoraId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereHorarioId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Horario whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Horario extends Model
{
    //use HasFactory;

    protected $table = 'horarios';
    protected $primaryKey = 'horario_id';

    public function dias()
    {
        return $this->belongsTo(Dia::class, 'dia_id', 'dia_id');
    }

    public function horas()
    {
        return $this->belongsTo(Hora::class, 'hora_id', 'hora_id');
    }

    public static function formatoHoras($horarios)
    {
        foreach ($horarios as $horario) {
            $horario->horas->ingreso = Carbon::parse($horario->horas->ingreso)->format('H:i');
            $horario->horas->egreso = Carbon::parse($horario->horas->egreso)->format('H:i');
        }
        return $horarios;
    }
}
