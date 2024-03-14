<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Dia
 *
 * @property int $dia_id
 * @property string $nombre
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Dia newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dia newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Dia query()
 * @method static \Illuminate\Database\Eloquent\Builder|Dia whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dia whereDiaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dia whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Dia whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Dia extends Model
{
    //use HasFactory;
    protected $table = "dias";
    protected $primaryKey = "dia_id";
}
