<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


use View;
use App\Ticket;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tickets = Ticket::all();

        return View::make('tickets.index')->with('tickets', $tickets);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('tickets.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'       => 'required',
            'description' => 'required',
            'priority'    => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('tickets/create')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $ticket = new Ticket;
            $ticket->title       = Input::get('title');
            $ticket->description      = Input::get('description');
            $ticket->priority = Input::get('priority');
            $ticket->customer_id = 1;  // TODO
            $ticket->save();

            // redirect
            Session::flash('message', 'Successfully created ticket!');
            return Redirect::to('tickets');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // get the ticket
        $ticket = Ticket::find($id);

        // show the view and pass the ticket to it
        return View::make('tickets.show')->with('ticket', $ticket);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // get the ticket
        $ticket = Ticket::find($id);

        // show the edit form and pass the ticket
        return View::make('tickets.edit')->with('ticket', $ticket);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'title'       => 'required',
            'description'      => 'required',
            'priority' => 'required|numeric'
        );
        $validator = Validator::make(Input::all(), $rules);

        // process the login
        if ($validator->fails()) {
            return Redirect::to('neticketrds/' . $id . '/edit')
                ->withErrors($validator)
                ->withInput(Input::except('password'));
        } else {
            // store
            $ticket = Ticket::find($id);
            $ticket->title       = Input::get('title');
            $ticket->description      = Input::get('description');
            $ticket->priority = Input::get('priority');
            $ticket->save();

            // redirect
            Session::flash('message', 'Successfully updated ticket');
            return Redirect::to('tickets');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // delete
        $ticket = Ticket::find($id);
        $ticket->delete();

        // redirect
        Session::flash('message', 'Successfully resolved the ticket!');
        return Redirect::to('tickets');
    }
}
