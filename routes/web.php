<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])
    ->name('inicio');
Route::get('sobre-nosotros', [\App\Http\Controllers\HomeController::class, 'sobreNosotros'])
    ->name('sobre-nosotros');
Route::get('cursos', [\App\Http\Controllers\HomeController::class, 'cursos'])
    ->name('cursos');
Route::get('cursos/{id}', [\App\Http\Controllers\HomeController::class, 'verCurso'])
    ->name('ver-curso');
Route::get('blog', [\App\Http\Controllers\HomeController::class, 'blog'])
    ->name('blog');
Route::get('ver-entrada/{id}', [\App\Http\Controllers\HomeController::class, 'verEntrada'])
    ->name('ver-entrada')
    ->whereNumber('id');

Route::middleware('auth')
    ->controller(\App\Http\Controllers\HomeController::class)
    ->group(function(){
        Route::get('mis-cursos', 'misCursos')
            ->name('misCursos');
        Route::get('mis-cursos/{id}/confirmarBaja', 'confirmarBaja')
            ->name('confirmarBaja')
            ->whereNumber('id');
        Route::get('mis-cursos/{id}/administrar', 'formAdministrar')
            ->name('formAdministrar')
            ->whereNumber('id');
        Route::post('mis-cursos/{id}/editarModalidad', 'editarModalidad')
            ->name('editarModalidad')
            ->whereNumber('id');
        Route::post('mis-cursos/{id}/editarHorario', 'editarHorario')
            ->name('editarHorario')
            ->whereNumber('id');
        Route::post('mis-cursos/{id}/baja', 'baja')
            ->name('baja')
            ->whereNumber('id');
        Route::get('perfil', 'perfil')
            ->name('perfil');
        Route::post('perfil/{id}/editarInfoPersonal', 'editarInfoPersonal')
            ->name('editarInfoPersonal')
            ->whereNumber('id');
        Route::post('perfil/{id}/editarApariencia', 'editarApariencia')
            ->name('editarApariencia')
            ->whereNumber('id');
        Route::get('cursos/{id}/inscripcion', 'inscripcion')
            ->name('inscripcion')
            ->whereNumber('id');
    });    

/**
 * MercadoPago
 */
Route::middleware('auth')
    ->controller(\App\Http\Controllers\MPController::class)
    ->group(function(){
        Route::get('mp/{id}/compra', 'formMostrar')
            ->name('mp.compra');
        Route::get('mp/exito', 'exito')
            ->name('mp.exito');
        Route::get('mp/pendiente', 'pendiente')
            ->name('mp.pendiente');
        Route::get('mp/fallo', 'fallo')
            ->name('mp.fallo');
    });

/**
 * Autenticación Routes
*/
Route::middleware('redirigirSiEstaAutenticado')
    ->controller(\App\Http\Controllers\AuthController::class)
    ->group(function () {
        Route::get('iniciar-sesion', 'formLogin')
            ->name('auth.formLogin');
        Route::post('iniciar-sesion', 'iniciar')
            ->name('auth.iniciar');
    });
Route::post('cerrar-sesion', [\App\Http\Controllers\AuthController::class, 'cerrar'])
    ->name('auth.cerrarSesion');

/**
 * Recuperar password
 */
Route::middleware('redirigirSiEstaAutenticado')
    ->controller(\App\Http\Controllers\RecuperarPassword::class)
    ->group(function () {
        Route::get('recuperar-password', 'formRecuperarPassword')
            ->name('auth.formRecuperarPassword');
        Route::post('recuperar-password', 'recuperarPassword')
            ->name('auth.recuperarPassword');
        Route::get('recuperar-password/{token}/{id}', 'formResetear')
            ->name('auth.formResetear');
        Route::post('recuperar-password/resetear', 'resetearPassword')
            ->name('auth.resetearPassword');
    });

/**
 * Registro Routes
 */
Route::middleware('redirigirSiEstaAutenticado')
    ->controller(\App\Http\Controllers\RegistroController::class)
    ->group(function (){
        Route::get('registrarse', 'formRegistro')
            ->name('auth.formRegistro');
        Route::post('registrarse', 'registrarse')
            ->name('auth.registrarse');
    });

/**
 * Panel Routes
 */
Route::middleware('auth', 'esAdmin')
    ->controller(\App\Http\Controllers\PanelController::class)
    ->group(function () {
        Route::get('admin/panel', 'index')
            ->name('admin.panel.inicio');
    });

/** 
 * Entradas Routes
 */
Route::middleware('auth', 'esAdmin')
    ->controller(\App\Http\Controllers\EntradasController::class)
    ->group(function () {
        Route::get('admin/entradas', 'index')
            ->name('admin.entradas.inicio');
        Route::get('admin/entradas/papelera', 'papelera')
            ->name('admin.entradas.papelera');
        Route::post('admin/entradas/{id}/papelera', 'papeleraEliminar')
            ->name('admin.entradas.papeleraEliminar')
            ->whereNumber('id');
        Route::get('admin/entradas/{id}', 'ver')
            ->name('admin.entradas.ver')
            ->whereNumber('id');
        Route::get('admin/entradas/nueva', 'formNueva')
            ->name('admin.entradas.formNueva');
        Route::post('admin/entradas/nueva', 'publicar')
            ->name('admin.entradas.publicar');
        Route::get('admin/entradas/{id}/editar', 'formEditar')
            ->name('admin.entradas.formEditar')
            ->whereNumber('id');
        Route::post('admin/entradas/{id}/editar', 'editar')
            ->name('admin.entradas.editar')
            ->whereNumber('id');
        Route::get('admin/entradas/{id}/eliminar', 'confirmarEliminar')
            ->name('admin.entradas.confirmarEliminar')
            ->whereNumber('id');
        Route::post('admin/entradas/{id}/eliminar', 'eliminar')
            ->name('admin.entradas.eliminar')
            ->whereNumber('id');
        Route::post('admin/entradas/{id}/restablecer', 'restablecer')
            ->name('admin.entradas.restablecer')
            ->whereNumber('id');
    });

/**
 * Cursos Routes
 */
Route::middleware('auth', 'esAdmin')
    ->controller(\App\Http\Controllers\CursosController::class)
    ->group(function () {
        Route::get('admin/cursos', 'index')
           ->name('admin.cursos.inicio');
        Route::get('admin/cursos/papelera', 'papelera')
           ->name('admin.cursos.papelera');
        Route::post('admin/cursos/{id}/papelera', 'papeleraEliminar')
           ->name('admin.cursos.papeleraEliminar')
           ->whereNumber('id');
        Route::get('admin/cursos/{id}', 'ver')
           ->name('admin.cursos.ver')
           ->whereNumber('id');
        Route::get('admin/cursos/nuevo', 'formNuevo')
           ->name('admin.cursos.formNuevo');
        Route::post('admin/cursos/nuevo', 'publicar')
           ->name('admin.cursos.publicar');
        Route::get('admin/cursos/{id}/editar', 'formEditar')
           ->name('admin.cursos.formEditar')
           ->whereNumber('id');
        Route::post('admin/cursos/{id}/editar', 'editar')
           ->name('admin.cursos.editar')
           ->whereNumber('id');
        Route::get('admin/cursos/{id}/eliminar', 'confirmarEliminar')
           ->name('admin.cursos.confirmarEliminar')
           ->whereNumber('id');
        Route::get('admin/cursos/{id}/modificar', 'modificarMostrar')
           ->name('admin.cursos.modificarMostrar')
           ->whereNumber('id');
        Route::post('admin/cursos/{id}/eliminar', 'eliminar')
           ->name('admin.cursos.eliminar')
           ->whereNumber('id');
        Route::post('admin/cursos/{id}/restablecer', 'restablecer')
           ->name('admin.cursos.restablecer')
           ->whereNumber('id');
    });

/**
 * Usuarios Routes
 */
Route::middleware('auth', 'esAdmin')
    ->controller(\App\Http\Controllers\UsuariosController::class)
    ->group(function(){
        Route::get('admin/usuarios', 'index')
            ->name('admin.usuarios.inicio');
        Route::get('admin/usuarios/{id}', 'ver')
            ->name('admin.usuarios.ver')
            ->whereNumber('id');
    });
