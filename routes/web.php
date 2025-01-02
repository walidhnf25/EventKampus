<?php

use App\Http\Controllers\AlamatController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegistrasiController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventsController;
use App\Http\Controllers\HistoriController;
use App\Http\Controllers\KalenderController;
use App\Http\Controllers\ListEventController;
use App\Http\Controllers\UploadEventController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UlasanController;
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


# --------------------------Routing Fungsi Upload----------------------------------

Route::get('/Events/new', function () {
    return view('UploadEvent');
});

Route::get('/Events/{idEvent}/edit', EventsController::class .'@showupdate')->name('event.showupdate');

Route::get('/Events', ListEventController::class .'@index')->name('index');

Route::post('/Events/tambah', UploadEventController::class .'@store')->name('store');

Route::post('/Events/{idEvent}/update', EventsController::class .'@update')->name('event.update');

Route::post('/Events/{idEvent}/delete', EventsController::class .'@destroy')->name('event.destroy');

Route::get('search', [EventsController::class, 'search'])->name('event.search');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::post('/login', [LoginController::class, 'authenticate'])->name('authenticate');

Route::get('/Registrasi', [RegistrasiController::class, 'index'])->middleware('guest');

Route::post('/Registrasi', RegistrasiController::class .'@store')->name('users.store');

# ---------------------------------------------------------------------------------


Route::get('/', function () {
    return view('Registrasi');
});

Route::get('Login', function () {
    return view('Login');
});

Route::post('Login', function () {
    return view('Login');
});
Route::get('dashboard', [DashboardController::class, 'index']);
Route::get('kalender', [KalenderController::class, 'index']);

Route::get('pembayaran', function () {
    return view('pembayaran');
});

Route::get('/events/{id}', [EventsController::class, 'showEvent'])->name('event.show');
Route::post('/daftar-event/{eventId}', [EventsController::class, 'daftarEvent'])->name('daftar.event');

Route::get('eventregist', function () {
    return view('eventregist');
});

Route::post('pembayaran', function () {
    return view('pembayaran');
});


Route::get('Search', function () {
    return view('Search');
});

Route::get('Profile', function () {
    return view('Profile');
});

Route::get('/Profile', [UsersController::class, 'showProfile'])->name('Profile');
Route::post('/Profile/update', [UsersController::class, 'update'])->name('Profile.update');

Route::get('Review', [UlasanController::class, 'showEvents'])->name('events.review');
Route::post('events/{id}/Review', [UlasanController::class, 'submitReview'])->name('submit.review');

Route::get('history', [HistoriController::class, 'getEventData']);

Route::get('detailEvent', function () {
    return view('detailEvent');
});


Route::get('alamat', [AlamatController::class, 'index']);