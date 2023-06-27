<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use UniSharp\LaravelFilemanager\Lfm;
use App\Http\Controllers\Front\PostController as FrontPostController;

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

// Les pages accessibles à tous
Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/post', [FrontPostController::class, 'index'])->name('gallery');
Route::get('/post/detail/{id}', [FrontPostController::class, 'show'])->name('detail');

// Routes réservés aux utilisateurs connecté
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/post/create', [PostController::class, "createForm"])->name('post.create');
    Route::post('/post/create', [PostController::class, "postForm"])->name('post.save');

    Route::get('/post/edit/{id}', [PostController::class, "editForm"])->name('post.edit');
    Route::put('/post/edit/{id}', [PostController::class, "putForm"])->name('post.update');

    Route::put('/post/publish/{id}', [PostController::class, "publish"])->name('post.publish');

    Route::delete('/post/delete/{id}', [PostController::class, "destroy"])->name('post.destroy');
});

// Gestion des fichiers
Route::group(['prefix' => 'laravel-filemanager', 'middleware' => 'auth'], function () {
    Lfm::routes();
});

// Routes liés à l'inscription et la connexion des utilisateurs
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});





require __DIR__ . '/auth.php';
