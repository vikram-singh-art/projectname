<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\crudController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/',function(){
//     return view('file');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::get('/',[crudController::class,'index'])->name('index');
Route::get('/crud',[crudController::class,'create'])->name('crud');
Route::post('/store',[crudController::class,'store']);
Route::get('/edit/{id}',[crudController::class,'edit']);
Route::put('/update/{id}',[crudController::class,'update']);
Route::delete('/delete/{id}', [CrudController::class, 'destroy']);



// Route::fallback(function () {
//     return view('404');
// });

require __DIR__.'/auth.php';
