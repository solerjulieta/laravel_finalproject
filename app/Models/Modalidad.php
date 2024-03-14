<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Modalidad
 *
 * @property int $modalidad_id
 * @property string $nombre
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Modalidad newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Modalidad newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Modalidad query()
 * @method static \Illuminate\Database\Eloquent\Builder|Modalidad whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Modalidad whereModalidadId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Modalidad whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Modalidad whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Modalidad extends Model
{
    //use HasFactory;
    protected $table = "modalidades";
    protected $primaryKey = "modalidad_id";
}
