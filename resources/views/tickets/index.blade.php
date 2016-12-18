@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            
            <!-- Current Tiickets -->
            @if (count($tickets) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Tickets
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <thead>
                                <th>Ticket</th>
                                <th>&nbsp;</th>
                            </thead>
                            <tbody>
                                @foreach ($tickets as $ticket)
                                    <tr>
                                        <td class="table-text"><div>{{ $ticket->title }}</div></td>

                                        <!-- View Ticket -->
                                        <td>
                                            <form action="{{ action('TicketController@show', $ticket->id) }}" method="GET">
                                                <button type="submit" class="btn btn-primary">
                                                    View
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
