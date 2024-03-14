<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Roles
 *
 * @property int $rol_id
 * @property string $nombre
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Roles newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Roles newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Roles query()
 * @method static \Illuminate\Database\Eloquent\Builder|Roles whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Roles whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Roles whereRolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Roles whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Roles extends Model
{
    //use HasFactory;
    protected $table = "roles";
    protected $primaryKey = "pais_id";
}
