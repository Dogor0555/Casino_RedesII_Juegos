<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\PuntajesController;

use App\Http\Controllers\PlayerController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [AuthController::class,'login']);

Route::post('login', [AuthController::class,'AuthLogin']);

Route::get('signup', function () { return view('auth.register');});

Route::post('/register', [AuthController::class, 'registerUser'])->name('register.user');

Route::get('logout', [AuthController::class,'logout']);
Route::get('forgot-password', [AuthController::class, 'forgotpassword']);
Route::post('forgot-password', [AuthController::class, 'PostForgotPassword']);
Route::get('reset/{token}', [AuthController::class,'reset']);
Route::post('reset/{token}', [AuthController::class,'PostReset']);

//Route::get('admin/admin/list', function () {
//    return view('admin.admin.list');
//});


Route::group (['middleware' => 'admin'], function(){
    Route::get('admin/dashboard', [DashboardController::class,'dashboard']);
    Route::get('admin/admin/list', [AdminController::class,'list']);
    Route::get('admin/admin/add', [AdminController::class,'add']);
    Route::post('admin/admin/add', [AdminController::class,'insert']);
    Route::get('admin/admin/edit/{id}', [AdminController::class,'edit']);
    Route::post('admin/admin/edit/{id}', [AdminController::class,'update']);
    Route::get('admin/admin/delete/{id}', [AdminController::class,'delete']);


    Route::get('admin/class/list', [ClassController::class,'list']);
    Route::get('admin/class/add', [ClassController::class,'add']);
    Route::post('admin/class/add', [ClassController::class,'insert']);
    Route::get('admin/class/edit/{id}', [ClassController::class,'edit']);
    Route::post('admin/class/edit/{id}', [ClassController::class,'update']);
    Route::get('admin/class/delete/{id}', [ClassController::class,'delete']);



    Route::get('admin/menu', [AdminController::class, 'showMenu']);

});


Route::group(['middleware' => 'teacher'], function(){
    Route::get('teacher/dashboard', [DashboardController::class,'dashboard']);
});


Route::group(['middleware' => 'player'], function(){
    Route::get('player/game', [DashboardController::class,'dashboard']);
    Route::get('player/game', [PlayerController::class, 'showGame']);
    Route::post('player/guardarPuntaje',[PuntajesController::class,"guardarPuntaje"])->name("guardarPuntaje")->middleware("auth");

    Route::get('player/menu', [PlayerController::class, 'showMenu']);
    Route::get('player/puntajes', [PuntajesController::class, 'showPuntaje']);
    Route::get('player/perfil', [PerfilController::class, 'showPerfil']);
    Route::post('/perfil/{id}/update', [PerfilController::class, 'update'])->name('perfil.update');
    
    Route::get('/perfil', [PlayerController::class, 'showProfileEditor'])->name('perfil');

});



Route::group(['middleware' => 'parent'], function(){
    Route::get('parent/dashboard', [DashboardController::class,'dashboard']);
});
