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
                                        <td class="table-text"><div>{{ $ticket->description }}</div></td>
                                        <td class="table-text"><div>{{ $ticket->priority }}</div></td>

                                        <!-- Task Resolve (Delete) Button -->
                                        <td>
                                            <form action="{{ action('TicketController@destroy', $ticket->id) }}" method="POST">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Resolve
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
