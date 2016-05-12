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

    // Si está autentificado vamos al home
    if (Auth::check()) {

        return redirect('home');

    } else {

        $comunidad = \App\Comunidad::all();
        $registrado = count($comunidad) > 0 ? true : false;

        return view('welcome', compact('registrado'));

    }

});

// Confirmación email route
Route::get('confirmation/{token}', [
    'uses' => 'Auth\AuthController@getConfirmation',
    'as'   => 'confirmation'
]);

Route::group(['middleware' => 'perfil:admin'], function () {

    Route::auth();

    Route::resource('comunidad', 'ComunidadController',
        ['only' => ['index', 'create', 'store', 'edit', 'update']]
    );
    Route::resource('tipospropiedades', 'TiposPropiedadesController',
        ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]
    );
    Route::resource('propiedades', 'PropiedadesController',
        ['only' => ['index', 'create', 'store', 'edit', 'update', 'destroy']]
    );
    Route::resource('propietarios', 'UsersController');

// Relación Propiedades y Propietarios
    Route::resource('relacion', 'RelacionController',
        ['only' => ['index', 'create', 'store', 'destroy']]
    );

    Route::resource('garajes', 'GarajesController',
        ['only' => ['index', 'create', 'store', 'destroy']]
    );

    Route::resource('contabilidad', 'ContabilidadController',
        ['only' => ['index']]
    );
    Route::resource('ingresos', 'IngresosController',
        ['only' => ['index', 'create', 'store', 'destroy']]
    );
    Route::resource('gastos', 'GastosController',
        ['only' => ['index', 'create', 'store', 'destroy']]
    );

    Route::resource('junta', 'JuntasController',
        ['only' => ['index', 'store']]
    );

    Route::get('reportes/{date_start}/{date_end}', 'PdfController@crear_reporte');

});