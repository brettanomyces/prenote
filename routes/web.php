<?php

use App\Ticket;
use Illuminate\Http\Request;

/**
 * Show Ticket Dashboard
 */
Route::get('/', function () {
    $tickets = Ticket::orderBy('created_at', 'asc')->get();

    return view('tickets', [
        'tickets' => $tickets
    ]);
});

/**
 * Add New Ticket
 */
Route::post('/ticket', function (Request $request) {
    $validator = Validator::make($request->all(), [
        'title' => 'required|max:255',
    ]);

    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }

    $ticket = new Ticket;
    $ticket->title = $request->title;
    $ticket->save();

    return redirect('/');
});

/**
 * Delete Ticket
 */
Route::delete('/ticket/{ticket}', function (Ticket $ticket) {
    //
});

/**
 * Retrieve all Customers
 */
Route::get('/customer', function () {
    //
});


/**
 * Retrieve customer by id
 */
Route::get('/customer/{customer}', function (Customer $customer) {
    //
});