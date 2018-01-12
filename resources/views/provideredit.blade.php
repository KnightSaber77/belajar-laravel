@extends('app')

@section('content')
    <div class="panel-body">
        <h1 align = "center">Edit Provider</h1> <br>
        <!-- New Task Form -->
        <form action="{{ url('admin/provider/editprovider/'.$provider->id)}}" method="POST" class="form-horizontal">
            {{ csrf_field() }}

            <!-- Task Name -->
            <div class="form-group">
                <label for="providername" class="col-sm-3 control-label">Provider Name</label>

                <div class="col-sm-6">
                    <input type="text" name="providername" id="providername" class="form-control" value="{{$provider->providername}}">
                </div>
                <br>
                <br>
                <label for="description" class="col-sm-3 control-label">Provider Description</label>
                <div class="col-sm-6">
                    <input type="text" name="description" id="description" class="form-control" value="{{ $provider->description}}">
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