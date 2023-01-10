<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmpleadoController;
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
//Route::get('/usr',[HomeController::class, 'users'] );
Route::get('/', function () {
    return view('welcome');
});

/*Route::get('/empleado', function () {
    return view('empleado.index');
});

Route::get('empleado/create',[EmpleadoController::class,'create']);
*/

Route::resource('empleado',EmpleadoController::class);

////////////////////////////////////////////
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::post('/users/store',[UserController::class,'store'])->name('user.store');
Route::get('/users/{id}/edit',[UserController::class,'edit'])->middleware(['auth'])->name('edit');
Route::get('/users',[UserController::class,'index']);
require __DIR__.'/auth.php';
