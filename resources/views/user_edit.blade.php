@extends('app')

@section('content')
    <div class="panel-body">
        <h1 align = "center">Edit Provider</h1> <br>
        <!-- New Task Form -->
        <form action="{{ url('admin/user/editadmin/'.$admin->username)}}" method="POST" class="form-horizontal">
        {{ csrf_field() }}

        <!-- Task Name -->
            <div class="form-group">
                <label for="username" class="col-sm-3 control-label">Username</label>

                <div class="col-sm-6">
                    <input type="text" name="hidden" id="username" class="form-control" value="{{$admin->username}}" readonly>
                </div>

                <br>
                <br>
                <label for="password" class="col-sm-3 control-label">Password</label>
                <div class="col-sm-6">
                    <input type="text" name="password" id="password" class="form-control" value="{{ $admin->password}}">
                </div>

                <br>
                <br>
                <label for="description" class="col-sm-3 control-label">Description</label>
                <div class="col-sm-6">
                    <input type="text" name="description" id="description" class="form-control" value="{{ $admin->description}}">
                </div>
            </div>

            <!-- Add Task Button -->
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-default">
                        <i class="fa fa-btn fa-pencil"></i>Edit Provider
                    </button>
                </div>
            </div>
        </form>
    </div>

@endsection