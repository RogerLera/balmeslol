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

/* --- GUIAS --- */
Route::get('/guias', 'GuiaController@index');
Route::get('/guias/{id}', 'GuiaController@obtenerGuia');
// Alomejor necesita crear ruta para favoritos, no desde GuiaController.
Route::get('/guias/favoritos', 'GuiaController@obtenerGuiasFavoritos');
Route::post('/guias/crear', 'GuiaController@crearGuia');
Route::put('/guias/{guia}/editar', 'GuiaController@editarGuia');
Route::delete('/guias/{guia}', 'GuiaController@eliminarGuia');

/* --- USUARIOS --- */
Route::group(['middleware' => ['auth']], function () {
    Route::get('/perfil/{id}', 'UserController@mostrarPerfil');
    Route::get('/perfil/{id}/avatar', 'UserController@mostrarAvatar');
    Route::get('/perfil/{id}/editar', 'UserController@formularioEditarUser');
    Route::post('/perfil/{id}/editar', 'UserController@editarUser');
    Route::delete('/perfil/{id}', 'UserController@eliminarUser');
});

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

//Route::group(['middleware' => ['web']], function () {
    // Rutas inicio sesión.
//    Route::get('/user/inicioSesion','Auth\AuthController@formularioInicioSesion');
//    Route::post('/user/inicioSesion','Auth\AuthController@inicioSesion');
//    Route::get('/user/logout','Auth\AuthController@cerrarSesion');

    // Rutas registro user.
//    Route::get('user/registro', 'Auth\AuthController@formularioRegistro');
//    Route::post('user/registro', 'Auth\AuthController@create');

//    Route::get('/user', 'UserController@index');

//});
