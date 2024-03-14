<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
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
 */
	class Curso extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Dia extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Duracion extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Entrada extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Etiqueta
 *
 * @property int $etiqueta_id
 * @property string $nombre
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Etiqueta newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Etiqueta newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Etiqueta query()
 * @method static \Illuminate\Database\Eloquent\Builder|Etiqueta whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etiqueta whereEtiquetaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etiqueta whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Etiqueta whereUpdatedAt($value)
 */
	class Etiqueta extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Hora extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Horario extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Inscripcion extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Modalidad extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Objetivo extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Perfil
 *
 * @property int $perfil_id
 * @property int $usuario_id
 * @property string|null $avatar
 * @property string|null $bio
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Usuario $usuario
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil query()
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereBio($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil wherePerfilId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Perfil whereUsuarioId($value)
 */
	class Perfil extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\RecuperarPassword
 *
 * @property int $recuperar_id
 * @property int $usuario_id
 * @property string $token
 * @property string $expiracion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Usuario $usuario
 * @method static \Illuminate\Database\Eloquent\Builder|RecuperarPassword newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RecuperarPassword newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|RecuperarPassword query()
 * @method static \Illuminate\Database\Eloquent\Builder|RecuperarPassword whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecuperarPassword whereExpiracion($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecuperarPassword whereRecuperarId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecuperarPassword whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecuperarPassword whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|RecuperarPassword whereUsuarioId($value)
 */
	class RecuperarPassword extends \Eloquent {}
}

namespace App\Models{
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
 */
	class Roles extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Usuario
 *
 * @property int $usuario_id
 * @property int $rol_id
 * @property string $email
 * @property string $password
 * @property string $nombre
 * @property string $apellido
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Curso[] $cursos
 * @property-read int|null $cursos_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Inscripcion[] $inscripciones
 * @property-read int|null $inscripciones_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \App\Models\Perfil|null $perfil
 * @property-read \App\Models\Roles $roles
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario query()
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereApellido($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereNombre($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereRolId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Usuario whereUsuarioId($value)
 */
	class Usuario extends \Eloquent {}
}

