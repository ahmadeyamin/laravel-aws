<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;

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
    // return Storage::get('itechut.jpg');
    return [
        'time' => (microtime(true) - LARAVEL_START) * 1000,
        'memory' => memory_get_peak_usage() / 1024 / 1024,
        'server' => $_SERVER,
        'user' => User::all(),
    ];
    
});

Route::get('/optimize', function () {
    Artisan::call('optimize');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
