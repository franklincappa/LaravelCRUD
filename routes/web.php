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
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;

Route::get('/',[HomeController::class,'index']);
Route::get('/dashboard',[DashboardController::class,'index']);


Route::get('/', function () {
    //return view('welcome');
    return view('auth.login');
});

Route::get('/saludo', function (){
    return [
        'saludo'=>'Hola',
        'nombre'=>'Franklin cappa'
    ];
});

Route::get('/test', function (){
    return view('test');
    //return view('test',['title'=>'Curso de PHP con LARAVEL']);
});



//Rutas para empleados
use App\Http\Controllers\EmpleadoController;

Route::get('/empleado', function(){
    return view('empleado.index');
});

//Route::get('empleado/create',[EmpleadoController::class,'create']);

Route::resource('empleado',EmpleadoController::class)->middleware('auth');

Auth::routes();//(['register'=>false,'reset'=>false]);  //opción registras y recordar contraseña desactivamos

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>'auth'],function(){
    Route::get('/home', [EmpleadoController::class, 'index'])->name('home');
});

