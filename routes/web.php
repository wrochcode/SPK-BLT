<?php

use App\Http\Controllers\AlternatifAllController;
use App\User;
use App\Models\Post;

use App\Http\Controllers\ContactController;
use App\Http\Controllers\CriteriaController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ProfileInformationController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\SubCriteriaController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\UserController;
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

//Normal function
// Route::get('/', function () {
//     return view('home');
// });

//Simple fungction
//avaiable for laravel 7.4
// dd = merupakan helper Laravel untuk dumping / debugging dimana data yang ada pada variabel tersebut ditampilkan dalam model terstruktur yang dapat kita akses dengan mudah. 
//Route::get('/', fn() => dd(asset('css/app.css'))); 

//nextlevel fungction
// Route::get('/', fn() => view('home'));

// Route::get('profile/{username}', function ($username) {
//     return view('profile', ['name'  => $username
//     ]);
// });

// Route::view('about', 'about');

// ============================================================================

Route::get('/', HomeController::class);

// Route::get('profile/{identifier}', ProfileInformationController::class);


/* 
get,post,put/patch ( biasa untuk update data ) , delete  
*/

//informasi Route normal dari task

// Route::get('tasks', [TasksController::class, 'index' ]);
// // Route::get('tasks/create', [TasksController::class, 'create' ]); 
// //route ini tidak digunakan lagi karena untuk metode create sudah digabung menjadi satu dalam fungction store pada TasksController.php  
// Route::post('tasks', [TasksController::class, 'store']);
// Route::get('tasks/{id}/edit', [TasksController::class, 'edit']);
// Route::put('tasks/{id}', [TasksController::class, 'update']);
// Route::delete('tasks/{id}', [TasksController::class, 'destroy']);


Route::get('users', [UserController::class, 'index']);
Route::get('users/{user:username}', [UserController::class, 'show'])->name('users.show');


// Route::get('users/{user}/post', [UserController::class, 'post'])->name('users.post');
// Route::get('users/{user:post}', [UserController::class, 'post'])->name('users.post');

// Route::resource('criterias', CriteriaController::class);

Route::get('criterias', [CriteriaController::class, 'index']);
Route::post('criterias', [CriteriaController::class, 'store'])->name('criterias.store');
Route::get('criterias/{id}/edit', [CriteriaController::class, 'edit'])->name('criterias.edit');
Route::put('criterias/{id}', [CriteriaController::class, 'update'])->name('criterias.update');
Route::delete('criterias/{id}', [CriteriaController::class, 'destroy'])->name('criterias.destroy');



Route::get('subcriterias', [SubCriteriaController::class, 'index']);
Route::post('subcriterias', [SubCriteriaController::class, 'store'])->name('subcriterias.store');
Route::get('subcriterias/{id}/edit', [SubCriteriaController::class, 'edit'])->name('subcriterias.edit');
Route::put('subcriterias/{id}', [SubCriteriaController::class, 'update'])->name('subcriterias.update');
Route::delete('subcriterias/{id}', [SubCriteriaController::class, 'destroy'])->name('subcriterias.destroy');



// Route::resource('alternatifalls', AlternatifAllController::class);

Route::get('alternatifalls', [AlternatifAllController::class, 'index']);
Route::post('alternatifalls', [AlternatifAllController::class, 'store'])->name('alternatifalls.store');
Route::get('alternatifalls/{id}/edit', [AlternatifAllController::class, 'edit'])->name('alternatifalls.edit');
Route::put('alternatifalls/{id}', [AlternatifAllController::class, 'update'])->name('alternatifalls.update');
Route::delete('alternatifalls/{id}', [AlternatifAllController::class, 'destroy'])->name('alternatifalls.destroy');


Route::get('results', [ResultController::class, 'index']);
Route::post('results', [ResultController::class, 'store'])->name('results.store');
/*
Route::get('registers', [RegistrationController::class, 'create'])->name('register')->middleware('guest'); //penambahan middleware untuk pembatasan akses link  
Route::post('registers', [RegistrationController::class, 'store'])->name('register'); //valid jika ingin panggil name route di formnya

Route::get('login', [LoginController::class, 'create'])->name('login')->middleware('guest');
Route::post('login', [LoginController::class, 'store'])->name('login');
*/

// Route::get('contact', [ContactController::class, 'create']);
// Route::post('contact', [ContactController::class, 'store']);

Route::middleware('auth')->group(function(){

    Route::resource('tasks', TasksController::class);
    
    Route::post('logout', LogoutController::class)->name('logout');

});

Route::middleware('guest')->group(function(){

    Route::get('registers', [RegistrationController::class, 'create'])->name('register');   
    Route::post('registers', [RegistrationController::class, 'store'])->name('register'); //valid jika ingin panggil name route di formnya

    Route::get('login', [LoginController::class, 'create'])->name('login');
    Route::post('login', [LoginController::class, 'store'])->name('login');

});

