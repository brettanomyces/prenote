<?php

namespace App\Listeners;

use App\Events\UnhandledExceptionOccurred;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue; 
use App\Ticket;
use App\Priority;
use App\Customer;



class UnhandledExceptionListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UnhandledExceptionOccurred  $event
     * @return void
     */
    public function handle(UnhandledExceptionOccurred $event)
    {
        $ticket = new Ticket;
        $ticket->title       = 'UnhandledExceptionOccurred';
        $ticket->description = 'UnhandledExceptionOccurred';
        $ticket->priority_id = Priority::where('name', '=', 'Urgent')->first()->id;
        $ticket->customer_id = Customer::where('name', '=', 'Brett')->first()->id;
        $ticket->save();
    }
}
