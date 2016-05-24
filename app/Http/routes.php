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

/* --- INICIO --- */
Route::get('/', function () {
    return view('welcome');
});

/* --- CAMPEONES --- */
Route::get('/campeones', 'CampeonController@index');
Route::get('/campeones/{id}', 'CampeonController@mostrarCampeon');

/* --- OBJETOS --- */
Route::get('/objetos', 'ObjetoController@index');
Route::get('/objetos/{id}', 'ObjetoController@mostrarObjeto');

/* --- Hechizos --- */
Route::get('/hechizos', 'HechizoController@index');

/* --- GUIAS --- */
Route::get('/guias', 'GuiaController@index');
Route::get('/guias/crear', 'GuiaController@formularioCrearGuia');

// Alomejor necesita crear ruta para favoritos, no desde GuiaController.
Route::get('/guias/favoritos', 'GuiaController@obtenerGuiasFavoritos');
Route::get('/guias/usuario/{id}', 'GuiaController@misGuias');
Route::post('/guias/crear', 'GuiaController@crearGuia');
Route::get('/guias/{id}', 'GuiaController@obtenerGuia');
Route::put('/guias/{guia}/editar', 'GuiaController@editarGuia');
Route::delete('/guias/{guia}', 'GuiaController@eliminarGuia');

/* --- USUARIOS --- */
Route::group(['middleware' => ['auth']], function () {
    Route::get('/perfil/{id}', 'UserController@mostrarPerfil');
    Route::get('/perfil/{id}/avatar', 'UserController@mostrarAvatar');
    Route::get('/perfil/{id}/editar', 'UserController@formularioEditarUser');
    Route::post('/perfil/{id}/editar', 'UserController@editarUser');
    Route::post('/perfil/{id}/editar/password', 'UserController@editarUserPassword');
    Route::delete('/perfil/{id}', 'UserController@eliminarUser');
});

/* --- MENSAJES Messenger --- */
Route::group(['prefix' => 'mensajes'], function () {
    Route::get('/', ['as' => 'mensajes', 'uses' => 'MensajeController@index']);
    Route::get('crear', ['as' => 'mensajes.crear', 'uses' => 'MensajeController@create']);
    Route::post('/', ['as' => 'mensajes.guardar', 'uses' => 'MensajeController@store']);
    Route::get('{id}', ['as' => 'mensajes.mostrar', 'uses' => 'MensajeController@show']);
    Route::put('{id}', ['as' => 'mensajes.actualizar', 'uses' => 'MensajeController@update']);
});

/* --- ESTADISTICAS CAMPEONES/HECHIZOS --- */
Route::get('/estadisticas/genera', 'EstadisticasController@generaEstadisticas');
Route::get('/estadisticas/popularidad_campeones', 'EstadisticasController@mostrarPopularidadCampeones');
Route::get('/estadisticas/popularidad_hechizos', 'EstadisticasController@mostrarPopularidadHechizos');
Route::get('/estadisticas/bloqueo_campeones', 'EstadisticasController@mostrarBloqueoCampeones');

/* --- REGISTRE/INICI SESSIÓ --- */
Route::auth();
Route::get('/home', 'HomeController@index');

/* --- INVOCADOR --- */
Route::get('/invocador', 'InvocadorController@index');
Route::get('/partidas', 'ListaPartidasController@index');

/* -- LLAMADAS JSON -- */
Route::get('/json/hechizos', 'HechizoController@obtenerHechizos');
Route::get('/json/campeones', 'CampeonController@obtenerCampeones');
