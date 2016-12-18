<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use App\Events\UnhandledExceptionOccurred;

class EventController extends Controller
{
    /**
     * Raise an UnhandledExceptionOccurred event, should be handled by the UnhandledExceptionListener
     *
     * @return Response
     */
    public function __invoke()
    {
        event(new UnhandledExceptionOccurred());
        Session::flash('message', 'An UnhandledExceptionOccurred event has been raised!');

        return Redirect::to('tickets');
    }
}
