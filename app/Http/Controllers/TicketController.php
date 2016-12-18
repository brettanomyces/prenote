<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;


use View;
use App\Ticket;
use App\Customer;
use App\Priority;

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
        $customers = Customer::all();
        $priorities = Priority::all();  

        return View::make('tickets.index')
            ->with('tickets', $tickets)
            ->with('customers', $customers)
            ->with('priorities', $priorities);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = Customer::all();
        $priorities = Priority::all();

        return View::make('tickets.create')
            ->with('customers', $customers)
            ->with('priorities', $priorities);
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
        $rules = array(
            'title'       => 'required',
            'description' => 'required',
            'priority_id' => 'required|numeric',
            'customer_id' => 'required|numeric'
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
            $ticket->description = Input::get('description');
            $ticket->customer_id = Input::get('customer_id');
            $ticket->priority_id = Input::get('priority_id');
            $ticket->save();

            // redirect
            Session::flash('message', "Successfully created ticket '" . $ticket->title . "'");
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
        $customers = Customer::all();
        $priorities = Priority::all();  

        // show the view and pass the ticket to it
        return View::make('tickets.show')
            ->with('ticket', $ticket)
            ->with('customers', $customers)
            ->with('priorities', $priorities);
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
        $customers = Customer::all();
        $priorities = Priority::all();            

        // show the edit form and pass the ticket
        return View::make('tickets.edit')
            ->with('ticket', $ticket)
            ->with('customers', $customers)
            ->with('priorities', $priorities);
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
        $rules = array(
            'title'       => 'required',
            'description' => 'required',
            'customer_id' => 'required|numeric',
            'priority_id' => 'required|numeric'
        );

        $validator = Validator::make(Input::all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('tickets/' . $id . '/edit')
                ->withErrors($validator);
        } else {
            // store
            $ticket = Ticket::find($id);
            $ticket->title       = Input::get('title');
            $ticket->description = Input::get('description');
            $ticket->customer_id = Input::get('customer_id');
            $ticket->priority_id = Input::get('priority_id');
            $ticket->save();

            // redirect
            Session::flash('message', "Successfully updated ticket '" . $ticket->title . "'" );
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
        Session::flash('message', "Successfully resolved ticket '" . $ticket->title . "'" );
        return Redirect::to('tickets');
    }

}
