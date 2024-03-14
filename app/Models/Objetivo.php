<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Objetivo
 *
 * @property int $objetivo_id
 * @property string $objetivo
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Objetivo newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Objetivo newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Objetivo query()
 * @method static \Illuminate\Database\Eloquent\Builder|Objetivo whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Objetivo whereObjetivo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Objetivo whereObjetivoId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Objetivo whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Objetivo extends Model
{
    //use HasFactory;
    protected $table = "objetivos";
    protected $primaryKey = "objetivo_id";
}
