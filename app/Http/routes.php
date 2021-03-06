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
Route::get('lang/{lang}', ['as'=>'lang.switch', 'uses'=>'LanguageController@switchLang']);
Route::get('/', 'CampeonController@mostrarCampeonesGratuitos');

/* --- CAMPEONES --- */
Route::get('/campeones', 'CampeonController@index');
Route::get('/campeones/{id}', 'CampeonController@mostrarCampeon')->where('id', '[0-9]+');

/* --- OBJETOS --- */
Route::get('/objetos', 'ObjetoController@index');
Route::get('/objetos/{id}', 'ObjetoController@mostrarObjeto')->where('id', '[0-9]+');

/* --- HECHIZOS --- */
Route::get('/hechizos', 'HechizoController@index');

/* --- GUIAS --- */
// Solo usuarios registrados.
Route::group(['middleware' => ['auth']], function () {
    Route::get('/guias/usuario', 'GuiaController@guiasUsuario');
    Route::get('/guias/crear', 'GuiaController@formularioCrearGuia');
    Route::post('/guias/crear', 'GuiaController@crearGuia');
    Route::post('/guias/{id}/editar', 'GuiaController@editarGuia')->where('id', '[0-9]+');
    Route::delete('/guias/{id}', 'GuiaController@eliminarGuia')->where('id', '[0-9]+');

    /* --- FAVORITOS --- */
    Route::post('/guias/favoritos', 'FavoritoController@guardarAFavoritos');
    Route::delete('/guias/favoritos', 'FavoritoController@borrarDeFavoritos');

    /* --- VOTACIONES --- */
    Route::post('/guias/votacion', 'VotacionController@votacion');
    Route::get('/guias/votacion', 'GuiaController@actualizarValoracion');
});

// Para todos (público).
Route::get('/guias', 'GuiaController@index');
Route::get('/guias/{aMostrar}', 'GuiaController@index')->where('aMostrar', '[A-Za-z]+');
Route::get('/guias/{id}', 'GuiaController@obtenerGuia')->where('id', '[0-9]+');

/* --- USUARIOS --- */
Route::get('/perfil/{id}', 'UserController@mostrarPerfil')->where('id', '[0-9]+');
Route::get('/perfil/{id}/avatar', 'UserController@mostrarAvatar')->where('id', '[0-9]+');
Route::group(['middleware' => ['auth']], function () {
    Route::get('/perfil/{id}/editar', 'UserController@formularioEditarUser')->where('id', '[0-9]+');
    Route::post('/perfil/{id}/editar', 'UserController@editarUser')->where('id', '[0-9]+');
    Route::post('/perfil/{id}/editar/password', 'UserController@editarUserPassword')->where('id', '[0-9]+');
    Route::delete('/perfil/{id}', 'UserController@eliminarUser')->where('id', '[0-9]+');
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
Route::group(['middleware' => ['auth']], function () {
    Route::get('/estadisticas/genera', 'EstadisticasController@generaEstadisticas');
});
Route::get('/estadisticas/popularidad_campeones', 'EstadisticasController@mostrarPopularidadCampeones');
Route::get('/estadisticas/popularidad_hechizos', 'EstadisticasController@mostrarPopularidadHechizos');
Route::get('/estadisticas/bloqueo_campeones', 'EstadisticasController@mostrarBloqueoCampeones');

/* --- REGISTRO/INICIO SESIÓN --- */
Route::auth();
Route::get('/home', 'HomeController@index');

/* --- INVOCADOR --- */
Route::get('/invocador', 'InvocadorController@index');
Route::get('/partidas', 'ListaPartidasController@index');

/* -- LLAMADAS JSON -- */
Route::get('/json/hechizos', 'GuiaController@mostrarHechizosPopUp');
Route::get('/json/campeones', 'GuiaController@mostrarCampeonesPopUp');
Route::get('/json/runas', 'GuiaController@mostrarRunasPopUp');
Route::get('/json/objetos', 'GuiaController@mostrarObjetosPopUp');
Route::get('/json/habilidades/{id}', 'GuiaController@mostrarHabilidadesPopUp')->where('id', '[0-9]+');
