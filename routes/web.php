<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobsController;
use App\Http\Controllers\PageController;


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
    return view('welcome');
});


Route::get('/jobs', function () {
    return view('dashboard.home');
});
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/job-show/{slug}', [PageController::class, 'show'])->name('job.show');

Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/index', [JobsController::class, 'index'])->name('index');
    Route::get('/post-add', [JobsController::class, 'create'])->name('post.create');
    Route::get('/post-add', [JobsController::class, 'catshow'])->name('post.create');
    Route::post('/post-store', [JobsController::class, 'store'])->name('post.store');
    Route::get('/post-edit/{slug}', [JobsController::class, 'edit'])->name('post.edit');
    Route::put('/post-update/{slug}', [JobsController::class, 'update'])->name('post.update');
    Route::get('/post-delete/{id}', [JobsController::class, 'destroy'])->name('post.delete');
    Route::get('/dashboard', [PageController::class, 'jobshow'])->name('dashboard');
});