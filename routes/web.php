<?php

use Illuminate\Http\Request;
use App\Http\Controllers\TicketController;

Route::resource('tickets', 'TicketController');

Route::get('/', 'TicketController@index');

Route::get('/event', 'EventController');

