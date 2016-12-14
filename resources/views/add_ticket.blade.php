@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Add Ticket
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <!-- New Ticket Form -->
                    <form action="{{ url('ticket')}}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Ticket Name -->
                        <div class="form-group">
                            <label for="ticket-title" class="col-sm-3 control-label">Title</label>
                            <div class="col-sm-6">
                                <input type="text" name="title" id="ticket-title" class="form-control" value="{{ old('ticket') }}">
                            </div>
                        </div>

                        <!-- Ticket Description -->
                        <div class="form-group">
                            <label for="ticket-description" class="col-sm-3 control-label">Description</label>
                            <div class="col-sm-6">
                                <input type="text" name="description" id="ticket-description" class="form-control" value="{{ old('ticket') }}">
                            </div>
                        </div>

                        <!-- Button Group -->
                        <div class="form-group">

                            <!-- Add Ticket Button -->
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Ticket
                                </button>
                            </div>

                            <!-- Cancel Button -->
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Cancel
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
