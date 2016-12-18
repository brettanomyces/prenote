@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Ticket
                </div>

                <div class="panel-body">
                    <div class="form-horizontal">
                
                        <!-- Ticket Title -->
                        <div class="form-group">
                            <label for="ticket-title" class="col-sm-3 control-label">Title</label>
                            <div for="ticket-title"class="col-sm-6">
                                <div id="ticket-title" class="form-control">{{ $ticket->title }}</div>
                            </div>
                        </div>

                        <!-- Ticket Description -->
                        <div class="form-group">
                            <label for="ticket-description" class="col-sm-3 control-label">Description</label>
                            <div for="ticket-description"class="col-sm-6">
                                <div id="ticket-description" class="form-control">{{ $ticket->description }}</div>
                            </div>
                        </div>

                        <!-- Ticket Priority-->
                        <div class="form-group">
                            <label for="ticket-priority" class="col-sm-3 control-label">Priority</label>
                            <div for="ticket-priority" class="col-sm-6">
                                <div id="ticket-priority" class="form-control">
                                    @foreach ($priorities as $priority)
                                        @if ($ticket->priority_id === $priority->id)
                                            {{ $priority->name }}
                                        @endif
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        <!-- Ticket Customer-->
                        <div class="form-group">
                            <label for="ticket-customer" class="col-sm-3 control-label">Customer</label>
                            <div for="ticket-customer"class="col-sm-6">
                                <div id="ticket-customer" class="form-control">  
                                    @foreach ($customers as $customer)
                                        @if ($ticket->customer_id === $customer->id)
                                            {{ $customer->name }}
                                        @endif
                                    @endforeach    
                                </div>
                            </div>
                        </div>
                
                        <!-- Resolve (Delete) Ticket Button -->
                        <div class="form-group">
                            <form action="{{ action('TicketController@destroy', $ticket->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <div class="col-sm-offset-3 col-sm-6">
                                    <button type="submit" class="btn btn-success">
                                        Resolve
                                    </button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

