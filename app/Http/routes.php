<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

/* --- CAMPEONES --- */
Route::get('/campeones', 'CampeonController@index');
Route::get('/campeones/{id}', 'CampeonController@obtenerCampeon');

/* --- GUIAS --- */
Route::get('/guias', 'GuiaController@index');
Route::get('/guias/{guia}', 'GuiaController@obtenerGuia');
// Alomejor necesita crear ruta para favoritos, no desde GuiaController.
Route::get('/guias/favoritos', 'GuiaController@obtenerGuiasFavoritos');
Route::post('/guias/crear', 'GuiaController@crearGuia');
Route::put('/guias/{guia}/editar', 'GuiaController@editarGuia');
Route::delete('/guias/{guia}', 'GuiaController@eliminarGuia');

/* --- USUARIOS --- */
Route::get('perfil/{id}', 'UsuarioController@mostrarPerfil');
Route::post('/perfil/{usuario}/editar', 'UsuarioController@editarUsuario');
Route::delete('/perfil/{usuario}', 'UsuarioController@eliminarUsuario');

/* --- MENSAJES --- */
Route::get('/mensajes/bandejaEntrada', 'MensajeController@entrada');
Route::get('/mensajes/bandejaSalida', 'MensajeController@salida');
Route::get('/mensajes/{id}', 'MensajeController@obtenerMensaje');
Route::post('/mensaje', 'MensajeController@crearMensaje');
Route::delete('/mensajes/{mensaje}', 'MensajeController@eliminarMensaje');

/* --- ESTADISTICAS CAMPEONES/HECHIZOS --- */
Route::get('/estadisticas/campeones', 'EstadisticasCampeonController@index');
Route::get('/estadisticas/hechizos', 'EstadisticasHechizoController@index');

/* --- REGISTRE/INICI SESSIÓ --- */
Route::auth();
Route::get('/home', 'HomeController@index');
