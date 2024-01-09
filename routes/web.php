<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AdminEventController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketOrderController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\SendMailController;



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

Route::get('/', [EventController::class, 'index'])->name('home');


Route::middleware(['auth', 'admin'])->group(function () {
    Route::view('dashboard', 'admin.dashboard')->name('admin.dashboard');
    // Route::get('/admin/events', [AdminEventController::class, 'index'])->name('admin.events.index');
    Route::get('/admin/events/create', [AdminEventController::class, 'create'])->name('admin.events.create');
    Route::post('/admin/events', [AdminEventController::class, 'store'])->name('admin.events.store');
    Route::get('/admin/events/{event}/edit', [AdminEventController::class, 'edit'])->name('admin.events.edit');
    Route::put('/admin/events/{event}', [AdminEventController::class, 'update'])->name('admin.events.update');
    Route::delete('/admin/events/{event}', [AdminEventController::class, 'destroy'])->name('admin.events.destroy');
    Route::get('/event/{event}', [EventController::class, 'show'])->name('event.show');
    Route::get('/admin/events', [AdminEventController::class, 'index'])->name('admin.events.index');
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/reservations', 'ReservationController@index')->name('admin.reservations.index');
    Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
    Route::get('/admin/tickets', [TicketController::class, 'index'])->name('admin.tickets.index');
    Route::put('/admin/tickets/{ticket}', [TicketController::class, 'update'])->name('admin.tickets.update');
    Route::get('/admin/reservations/{id}', [ReservationController::class, 'adminShow'])->name('reservations.show');
    Route::delete('/admin/reservations/{id}', [ReservationController::class, 'adminDestroy'])->name('reservations.destroy');
    Route::patch('/admin/reservations/{id}/scanned', [ReservationController::class, 'adminUpdateScanned'])->name('reservations.updateScanned');




    // Route::resource('events');
});
Route::middleware(['auth'])->group(function () {
    // Andere routes
    Route::get('/user/reservations', [ReservationController::class, 'userReservations'])->name('user.reservations');
    Route::get('/reservations', [ReservationController::class, 'allReservations'])->name('all.reservations');
    Route::get('/events/{id}', [EventController::class, 'show'])->name('events.show');
    // Route::get('/reservations/{id}', [ReservationController::class, 'showReservation'])->name('reservations.show');
    Route::get('/events/{id}', [EventController::class, 'show'])->name('events.details');
    Route::get('/reservation/{id}/pdf',[ReservationController::class, 'downloadPdf'])->name('reservation.pdf');
    Route::get('/reservations/{id}', [ReservationController::class, 'show'])->name('reservations.details');

    // Meer routes toevoegen indien nodig
});

Route::middleware('auth.ticket')->group(function () {
    // Jouw ticket bestelroutes hier
    Route::get('/events/{event}/order', [TicketOrderController::class, 'showOrderForm'])->name('event.order');
    Route::post('/events/{event}/order', [TicketOrderController::class, 'reserveTickets'])->name('event.reserve');

});
Route::get('/send-mail', [SendMailController::class, 'methodName'])->name('send.mail');








Auth::routes();
