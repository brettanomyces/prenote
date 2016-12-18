@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">

            <div class="panel panel-default">
                <div class="panel-heading">
                    New Ticket
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Ticket Form -->
                    <form action="{{ action('TicketController@store') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Ticket Title -->
                        <div class="form-group">
                            <label for="ticket-title" class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-6">
                                <input type="text" name="title" id="ticket-title" class="form-control" value="{{ old('title') }}">
                            </div>
                        </div>

                        <!-- Ticket Description -->
                        <div class="form-group">
                            <label for="ticket-description" class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-6">
                                <textarea rows="5" name="description" id="ticket-description" class="form-control">{{ old('description')}}</textarea>
                            </div>
                        </div>

                        <!-- Ticket Customer-->
                        <div class="form-group">
                            <label for="ticket-customer" class="col-sm-3 control-label">Customer</label>
                            <div class="col-sm-6">
                                 <select name="customer_id" id='ticket-customer' class="form-control" value="{{ old('customer_id') }}">
                                    <option value="">Please Select</option>
                                    @foreach($customers as $customer)
                                        <option value="{{$customer->id}}">{{ $customer->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Ticket Priority-->
                        <div class="form-group">
                            <label for="ticket-priority" class="col-sm-3 control-label">Priority</label>
                            <div class="col-sm-6">
                                 <select name="priority_id" id='ticket-priority' class="form-control" value="{{ old('priority_id') }}">
                                    <option value="">Please Select</option>
                                    @foreach($priorities as $priority)
                                        <option value="{{$priority->id}}">{{ $priority->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Add Task Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-primary">
                                    Add
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection

