<?php

use App\Http\Controllers\EventController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;



Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/show-event/{id}', [HomeController::class, 'showEvent'])->name('show_event');

//Route::get('/', [HomeController::class, 'search'])->name('search');
Route::get('/search-events', [HomeController::class, 'searchEventWithKeyword'])->name('searchEventWithKeyword');


// Routes for the subscribed User - the can manage their events and their raservations
Route::get('/myEvents', [EventController::class, 'myEvents'])->middleware(['auth', 'verified'])->name('myEvents');

Route::get('/events/add', [EventController::class, 'addEvent'])->middleware(['auth', 'verified'])->name('add_event');
Route::Post('/events/store', [EventController::class, 'storeEvent'])->middleware(['auth', 'verified'])->name('store_event');

Route::get('/events/edit/{id}', [EventController::class, 'editEvent'])->middleware(['auth', 'verified'])->name('edit_event');
Route::Post('/events/update/{id}', [EventController::class, 'updateEvent'])->middleware(['auth', 'verified'])->name('update_event');

Route::get('/events/delete/{id}', [EventController::class, 'deleteEvent'])->middleware(['auth', 'verified'])->name('delete_event');

Route::get('/my-reservations', [ReservationController::class, 'myReservations'])->middleware(['auth', 'verified'])->name('myReservations');
Route::get('/reserve-event/{id}', [ReservationController::class, 'reserveEvent'])->middleware(['auth', 'verified'])->name('reserve_event');


//Route::get('/events/add', [EventController::class, 'createEvent']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
