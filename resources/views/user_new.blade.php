@extends('app')

@section('content')
    <div class="panel-body">
        <h1 align = "center">Add Admin</h1> <br>
        <!-- New Task Form -->
        <form action="{{ url('createnewadmin')}}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Task Name -->
            <div class="form-group">
                <label for="username" class="col-sm-3 control-label">Username</label>

                <div class="col-sm-6">
                    <input type="text" name="username" id="username" class="form-control" value="{{ old('username') }}">
                </div>

                <br>
                <br>
                <label for="password" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-6">
                    <input type="text" name="password" id="password" class="form-control" value="{{ old('password') }}">
                </div>

                <br>
                <br>
                <label for="description" class="col-sm-3 control-label">Description</label>
                <div class="col-sm-6">
                    <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-plus"></i>Add Provider
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection