<?php

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
/*Route::get('/', function() {
    return response()->json([
     'stuff' => phpinfo()
    ]);
 })*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/eventos', 'Eventos@__invoke')->name('eventos');
Route::get('/eventosA', 'Eventos@__invoke')->name('eventosAdmin');
Route::get('/miPerfil', 'MiCuentaController@__invoke')->name('profile');
Route::get('/misEventos', 'Eventos@__invoke')->name('myEvents');
Route::get('/instituciones', 'Eventos@__invoke')->name('institutions');
Route::get('/nuevoEvento', 'RegistrarEventoController@__invoke')->name('nuevoEvento');
Route::post('/registrarEvento', 'RegistrarEventoController@create')->name('registrarEvento');


#Add "use Illuminate\Support\Facades\DB;" at the top of the script
Route::get("testConnection", function(){
    //If this code works, connection is successfull
    echo "Connected to: " . DB::connection()->getDatabaseName();
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
