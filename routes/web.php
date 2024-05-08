<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MyclassController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\UserController;
use App\Models\Myclass;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});


Route::get('images/{folder}/{filename}', function ($folder, $filename) {
    $path = storage_path('app/images/' . $folder . '/' . $filename);

    if (!file_exists($path)) {
        abort(500);
    }

    $file = file_get_contents($path);
    $type = mime_content_type($path);

    return response($file)->header('Content-Type', $type);
})->name('show-image');

// Route::get('/', [App\Http\Controllers\frontController::class, 'index']);
Auth::routes();

Route::get('/', [App\Http\Controllers\frontController::class, 'index']);
Route::get('/dashboard', [HomeController::class, 'index'])->name('home')->middleware('auth');

//route kelas admin
Route::get('/kelas', [KelasController::class, 'index'])->name('kelas.index')->middleware('auth');
Route::get('/kelas/create', [KelasController::class, 'create'])->name('kelas.create')->middleware('auth');
Route::post('/kelas/store', [KelasController::class, 'store'])->name('kelas.store')->middleware('auth');
Route::post('/kelas/daftar', [KelasController::class, 'daftar'])->name('kelas.daftar')->middleware('auth');
Route::patch('/kelas/update/{id}', [KelasController::class, 'update'])->name('kelas.update')->middleware('auth');
Route::delete('/kelas/destroy/{id}', [KelasController::class, 'destroy'])->name('kelas.destroy')->middleware('auth');
Route::get('/kelas/show/{id}', [KelasController::class, 'show'])->name('kelas.show')->middleware('auth');
Route::get('/kelas/edit/{id}', [KelasController::class, 'edit'])->name('kelas.edit')->middleware('auth');

//route kelas user
Route::get('/userkelas', [KelasController::class, 'userIndex'])->name('kelas.userIndex')->middleware('auth');
Route::get('/usermyclass', [MyclassController::class, 'userIndex'])->name('myclass.userIndex')->middleware('auth');
Route::get('/profile', [UserController::class, 'profile'])->name('user.profile')->middleware('auth');

Route::get('/user', [UserController::class, 'index'])->name('user.index')->middleware('auth');
Route::get('/user/create', [UserController::class, 'create'])->name('user.create')->middleware('auth');
Route::post('/user/store', [UserController::class, 'store'])->name('user.store')->middleware('auth');
Route::patch('/user/update/{id}', [UserController::class, 'update'])->name('user.update')->middleware('auth');
Route::delete('/user/destroy/{id}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('auth');
Route::get('/user/show/{id}', [UserController::class, 'show'])->name('user.show')->middleware('auth');
Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');


Route::get('/myclass', [MyclassController::class, 'index'])->name('myclass.index')->middleware('auth');
Route::get('/myclass/create', [MyclassController::class, 'create'])->name('myclass.create')->middleware('auth');
Route::post('/myclass/store', [MyclassController::class, 'store'])->name('myclass.store')->middleware('auth');
Route::patch('/myclass/update/{id}', [MyclassController::class, 'update'])->name('myclass.update')->middleware('auth');
Route::delete('/myclass/destroy/{id}', [MyclassController::class, 'destroy'])->name('myclass.destroy')->middleware('auth');
Route::get('/myclass/show/{id}', [MyclassController::class, 'show'])->name('myclass.show')->middleware('auth');
Route::get('/myclass/edit/{id}', [MyclassController::class, 'edit'])->name('myclass.edit')->middleware('auth');



Route::get('/peserta', [PesertaController::class, 'index'])->name('peserta.index')->middleware('auth');
Route::get('/peserta/create', [PesertaController::class, 'create'])->name('peserta.create')->middleware('auth');
Route::post('/peserta/store', [PesertaController::class, 'store'])->name('peserta.store')->middleware('auth');
Route::patch('/peserta/update/{id}', [PesertaController::class, 'update'])->name('peserta.update')->middleware('auth');
Route::delete('/peserta/destroy/{id}', [PesertaController::class, 'destroy'])->name('peserta.destroy')->middleware('auth');
Route::get('/peserta/show/{id}', [PesertaController::class, 'show'])->name('peserta.show')->middleware('auth');
Route::get('/peserta/edit/{id}', [PesertaController::class, 'edit'])->name('peserta.edit')->middleware('auth');

Route::get('/cetakPeserta', [PesertaController::class, 'cetak'])->name('peserta.cetak')->middleware('auth');