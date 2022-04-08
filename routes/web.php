<?php

//use App\Http\Controllers\CandidatoController;

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

Route::get('/', function () {
    return view('auth.login');
});

/*
Route::get('/candidato', function () {
    return view('candidato.index');
});

Route::get('/candidato/create',[CandidatoController::class,'create']);
*/

Route::resource('representante',RepresentanteController::class)->middleware('auth');
Route::resource('candidato',CandidatoController::class)->middleware('auth');
Auth::routes(['register'=>false, 'reset'=>false]);
/*
Route::resource('candidato',CandidatoController::class)->middleware('auth');
Route::get('/home', [CandidatoController::class, 'index'])->name('home');

// Route::group(['middleware' => 'auth'], function() {

//     Route::get('/', [CandidatoController::class, 'index'])->name('home');
// });

*/

Route::group(['middleware' => 'auth'], function () {
	//verifica si esta autorizado	
	Route::prefix('home')->group(function () {
		//la ruta inicial seria /home/	
		//Route::post('/', ['as' => 'home.index', 'uses' => 'CandidatoController@index']);
		Route::get('/', 'CandidatoController@index')->name('home');
	 });
});

// Route::get('/', function () {
//     return redirect(route('login'));
// });
