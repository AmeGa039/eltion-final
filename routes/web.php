<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\EventController;
use App\Http\Controllers\EventAttendeeController;


    Route::resource('events', EventController::class);

    Route::post('/events/{event}/join', [EventAttendeeController::class, 'join'])->name('events.join');
    Route::delete('/events/{event}/leave', [EventAttendeeController::class, 'leave'])->name('events.leave');
    

