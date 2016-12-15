<?php

use App\Ticket;
use Illuminate\Http\Request;

/**
 * API endpoints
 */
Route::resource('tickets', 'TicketController');


Route::get('/', function () {
    $tickets = Ticket::all();
    return View::make('tickets.index')->with('tickets', $tickets);
});

