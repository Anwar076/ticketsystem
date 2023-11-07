<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Auth;


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
    return view('home');
});
Route::get('/', [EventController::class, 'index']);
Route::get('/event/{event}', 'EventController@show')->name('event.show');
Route::get('/admin/events', 'EventController@index')->name('admin.events.index');
Route::get('/admin/users', 'UserController@index')->name('admin.users.index');
Route::get('/admin/reservations', 'ReservationController@index')->name('admin.reservations.index');




Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::view('dashboard', 'admin.dashboard')->name('admin.dashboard');
    // Route::resource('events');
});

Auth::routes();

